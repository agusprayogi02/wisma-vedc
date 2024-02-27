<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Ruangan';
    protected static ?string $modelLabel = 'Ruangan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->unique()
                    ->maxLength(10),
                Forms\Components\BelongsToSelect::make('boarding_house_id')
                    ->label("Nama Asrama")
                    ->relationship('boardingHouse', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\BelongsToSelect::make('room_status_id')
                    ->relationship('roomStatus', 'name')
                    ->label("Status Ruangan")
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\BelongsToSelect::make('room_type_id')
                    ->relationship('roomType', 'name')
                    ->label("Tipe Ruangan")
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Textarea::make('note')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('boardingHouse.name')
                    ->label("Nama Asrama")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('roomStatus.name')
                    ->label("Status Ruangan")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('note')
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
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
