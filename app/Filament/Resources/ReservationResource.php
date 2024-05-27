<?php

namespace App\Filament\Resources;

use App\Filament\Imports\ReservationImporter;
use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers\CustomersRelationManager;
use App\Filament\Resources\ReservationResource\RelationManagers\OrdererRelationManager;
use App\Filament\Resources\ReservationResource\RelationManagers\PaymentsRelationManager;
use App\Forms\Components\CheckboxList;
use App\Models\Reservation;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $pluralModelLabel = 'Reservasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')->relationship('user', 'name')
                    ->required()->preload()->label('Petugas')->default(auth()->user()->id)->disabled(),
                Select::make('orderer_id')->relationship('orderer', 'name')
                    ->required()->preload()->searchable()->label('Pemesan')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required(),
                        Textarea::make('address')
                            ->label('Alamat')
                            ->required(),
                        TextInput::make('phone')
                            ->label('No Telepon (08XXX)')
                            ->numeric()
                            ->required(),
                    ]),
                TextInput::make('nick_name')->required()->label('Nama Kegiatan'),
                TextInput::make('quantity')->required()->label('Jumlah'),
                Select::make('type')
                    ->options([
                        'PNBP' => 'PNBP',
                        'DIPA' => 'DIPA'
                    ])->default('DIPA')->required()->label('Jenis Biaya'),
                DateTimePicker::make('date_order')->default(now())->readOnly()
                    ->required()->label('Tanggal Pesan'),
                DatePicker::make('date_ci')->native(false)->required()->displayFormat('d/m/Y')
                    ->label('Tanggal Masuk')->closeOnDateSelection()->reactive()->afterStateUpdated(function ($state, Set $set) {
                        $set('date_co', null);
                    }),
                DatePicker::make('date_co')->label('Tanggal Keluar')->closeOnDateSelection()
                    ->displayFormat('d/m/Y')
                    ->disabled(function (callable $get) {
                        return $get('date_ci') == null;
                    })->minDate(function (callable $get) {
                        $min = $get('date_ci');
                        if ($min == null) {
                            return Carbon::now();
                        } else {
                            return Carbon::parse($min);
                        }
                    })->native(false)->reactive()->required(),
                Textarea::make('note')->nullable()->label('Catatan'),
                Select::make('boardingHouses')->relationship('boardingHouses', 'name', fn($query) => $query->where('type', 'internal'))
                    ->multiple()->label('Asrama')->required()->preload()->searchable(),
                Section::make('Ruangan')->schema([
//                    Select::make("rooms")->relationship('rooms', 'code')->multiple()->hiddenLabel(),
//                    TagList::make('room_codes')->hiddenLabel()->required()->disabled()->hidden(fn(Get $get) => $get('room_codes') == null),
//                    Actions::make([
//                        Action::make('rooms')->label('Pilih Ruangan')->button()->form(function (Get $get) {
//                            $rest = [
//                                "date_ci" => $get('date_ci'),
//                                "date_co" => $get('date_co'),
//                            ];
//                            $houses = BoardingHouse::find($get('boardingHouses'));
//                            $components = [];
//                            foreach ($houses as $house) {
//                                $components[] = Section::make($house->name)
//                                    ->schema(CustomersRelationManager::sectionRoom($house, $rest));
//                            }
//                            return $components;
//                        })->action(function (Set $set, array $data) {
//                            $arr = call_user_func_array('array_merge', $data);
//                            $set('room_codes', Room::whereIn('id', $arr)->pluck('code')->toArray());
//                            $set("rooms", $arr);
//                        }),
//                    ]),
                    CheckboxList::make("rooms")->relationship('rooms', 'code',
                        modifyQueryUsing: fn(Builder $query, Get $get) => $query->whereIn('boarding_house_id', $get('boardingHouses')))
                        ->hiddenLabel()->required()->hidden(fn(Get $get) => $get('boardingHouses') == null)->columns(5),
                ])->hidden(fn($get) => $get('boardingHouses') == null || $get('date_ci') == null || $get('date_co') == null),
            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nick_name')->searchable()->sortable()->label('Nama Kegiatan'),
                TextColumn::make('user.name')->searchable()->sortable()->label('User'),
                TextColumn::make('orderer.name')->searchable()->sortable()->label('Order'),
                TextColumn::make('quantity')->searchable()->sortable()->label('Jumlah'),
                TextColumn::make('type')->searchable()->sortable()->label('Tipe'),
                TextColumn::make('date_order')->searchable()->sortable()->label('Tanggal Pesan'),
                TextColumn::make('date_ci')->searchable()->sortable()->label('Tanggal Masuk'),
                TextColumn::make('date_co')->searchable()->sortable()->label('Tanggal Keluar'),
                TextColumn::make('note')->searchable()->sortable()->label('Catatan'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Tables\Actions\ImportAction::make()->importer(ReservationImporter::class),
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
            CustomersRelationManager::class,
            OrdererRelationManager::class,
            PaymentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
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
