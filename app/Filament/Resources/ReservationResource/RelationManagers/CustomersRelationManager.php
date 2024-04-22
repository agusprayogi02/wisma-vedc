<?php

namespace App\Filament\Resources\ReservationResource\RelationManagers;

use App\Models\Customer;
use App\Models\Room;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CustomersRelationManager extends RelationManager
{
    protected static string $relationship = 'customers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('room_id')
                    ->label('Ruang')
                    ->relationship('room', 'code')
                    ->rules([
                        fn(Get $get, Component $component): Closure => function (string $attr, $value, Closure $fail) use ($get, $component) {
                            $room = Room::find($value)->with('roomType')->first();
                            $cust = Customer::where([
                                ['reservation_id', '=', $get('reservation_id')],
                                ['room_id', '=', $value],
                            ])->count();
                            if ($cust > $room->roomType->capacity) {
                                $fail('Kamar ini sudah penuh!');
                            }
                        }
                    ])
                    ->required()
                    ->preload()
                    ->searchable(),
                TextInput::make('nik')->label('NIK'),
                TextInput::make('name')->label('Nama'),
                TextInput::make('npsn')->label('NPSN Sekolah'),
                TextInput::make('sekolah')->label('Nama Sekolah'),
                Select::make('gender')->options([
                    'P' => 'Perempuan',
                    'L' => 'Laki-laki',
                ])
                    ->rules([
                        fn(Get $get, Component $component): Closure => function (string $attr, $value, Closure $fail) use ($get, $component) {
                            $existCustomer = Customer::where([
                                ['reservation_id', '=', $get('reservation_id')],
                                ['room_id', '=', $get('room_id')],
                            ])->first();
                            $genders = [
                                'P' => 'Perempuan',
                                'L' => 'Laki-laki',
                            ];
                            if ($existCustomer !== null) {
                                if ($existCustomer->gender !== $value) {
                                    $fail('Kamar ini untuk ' . $genders[$existCustomer->gender]);
                                }
                            }
                        }
                    ])->required()->label('Jenis Kelamin'),
                TextInput::make('address')
                    ->label('Alamat'),
                TextInput::make('phone')
                    ->label('Telepon'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('room.name'), TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('address')
                    ->label('Alamat')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('Telepon')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
