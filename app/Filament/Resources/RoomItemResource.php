<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomItemResource\Pages;
use App\Filament\Resources\RoomItemResource\RelationManagers;
use App\Models\RoomItem;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomItemResource extends Resource
{
    protected static ?string $model = RoomItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Ruangan Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('room_id')
                    ->label('Ruangan')
                    ->relationship('room', 'code')
                    ->required()
                    ->preload()
                    ->searchable(),
                Select::make('item_id')
                    ->label('Barang')
                    ->relationship('item', 'name')
                    ->required()
                    ->preload()
                    ->searchable(),
                Select::make('status')
                    ->options([
                        'kurang' => 'Kurang',
                        'rusak' => 'Rusak',
                        'baik' => 'Baik',
                    ])
                    ->required(),
                TextInput::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('room.code')
                    ->label('Ruangan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('item.name')
                    ->label('Barang')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Jumlah')
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
            'index' => Pages\ListRoomItems::route('/'),
            'create' => Pages\CreateRoomItem::route('/create'),
            'edit' => Pages\EditRoomItem::route('/{record}/edit'),
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
