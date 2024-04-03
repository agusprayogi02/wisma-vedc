<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Models\Reservation;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
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
    protected static ?string $navigationLabel = 'Reservasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')->relationship('user', 'name')
                    ->required()->preload()->disabled()->label('Petugas')->default(auth()->user()->id),
                Select::make('orderer_id')->relationship('orderer', 'name')
                    ->required()->preload()->searchable()->label('Order')
                    ->hintAction(
                        Action::make('Add New')
                            ->icon('heroicon-m-plus')
                            ->requiresConfirmation()
                            ->action(function ($state) {
                                return redirect()->route('filament.admin.resources.orderers.create');
                            })
                    ),
                TextInput::make('quantity')->required()->label('Jumlah'),
                Select::make('type')
                    ->options([
                        'PNBP' => 'PNBP',
                        'DIPA' => 'DIPA'
                    ])->default('DIPA')->required()->label('Jenis Biaya'),
                DateTimePicker::make('date_order')->default(now())->readOnly()->required()->label('Tanggal Pesan'),
                DatePicker::make('date_ci')->native(false)->required()->label('Tanggal Masuk'),
                DatePicker::make('date_co')->native(false)->required()->label('Tanggal Keluar'),
                TextInput::make('note')->nullable()->label('Catatan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
