<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Room;
use Closure;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Customer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('reservation_id')
                    ->label('Pemesan')
                    ->relationship('reservation', 'id')
                    ->required()
                    ->preload()
                    ->searchable(),
                Select::make('room_id')
                    ->label('Ruang')
                    ->relationship('room', 'code')
                    ->rules([
                        fn(Get $get, Component $component): Closure =>
                        function (string $attr, $value, Closure $fail) use ($get, $component) {
                            $room = Room::find($value)->with('roomType')->first();
                            $count = Customer::where([
                                ['reservation_id', '=', $get('reservation_id')],
                                ['room_id', '=', $value],
                            ])->count();
                            if ($count > $room->roomType->capacity) {
                                $fail('Kamar ini sudah penuh!');
                            }
                        }
                    ])
                    ->required()
                    ->preload()
                    ->searchable(),
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                Select::make('gender')->options([
                    'P' => 'Perempuan',
                    'L' => 'Laki-laki',
                ])
                    ->rules([
                        fn(Get $get, Component $component): Closure =>
                        function (string $attr, $value, Closure $fail) use ($get, $component) {
                            $existCustomer = Customer::where([
                                ['reservation_id', '=', $get('reservation_id')],
                                ['room_id', '=', $get('room_id')],
                            ])->first();
                            $genders = [
                                'P' => 'Perempuan',
                                'L' => 'Laki-laki',
                            ];
                            if ($existCustomer->exists()) {
                                if ($existCustomer->gender !== $value) {
                                    $fail('Kamar ini untuk ' . $genders[$existCustomer->gender]);
                                }
                            }
                        }
                    ])->required()->label('Jenis Kelamin'),
                TextInput::make('address')
                    ->label('Alamat')
                    ->required(),
                TextInput::make('phone')
                    ->label('Telepon')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reservation.orderer.name')
                    ->label('Orderer')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('room.code')
                    ->label('Room')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('gender')
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
