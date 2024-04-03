<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomItemReportResource\Pages;
use App\Filament\Resources\RoomItemReportResource\RelationManagers;
use App\Models\RoomItem;
use App\Models\RoomItemReport;
use Filament\Forms;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomItemReportResource extends Resource
{
    protected static ?string $model = RoomItemReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Laporan Barang Ruangan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                belongsToSelect::make('user_id')->label('User')->relationship('user', 'name')->preload()->required()->default(auth()->user()->id),
                Select::make('room_item_id')
                    ->preload()
                    ->label('Ruangan')
                    ->options(
                        RoomItem::with('room')->get()->pluck('room.code', 'id')->toArray()
                    )
                    ->required()
                    ->searchable(),
                TextInput::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),
                Select::make('status')
                    ->options([
                        'hilang' => 'Hilang',
                        'rusak' => 'Rusak',
                    ])
                    ->required(),
                TextInput::make('note')
                    ->label('Catatan')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('roomItem.room.code')
                    ->label('Ruangan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label('Jumlah')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('note')
                    ->label('Catatan'),
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
            'index' => Pages\ListRoomItemReports::route('/'),
            'create' => Pages\CreateRoomItemReport::route('/create'),
            'edit' => Pages\EditRoomItemReport::route('/{record}/edit'),
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
