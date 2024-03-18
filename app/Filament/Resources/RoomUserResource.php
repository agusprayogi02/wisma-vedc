<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomUserResource\Pages;
use App\Filament\Resources\RoomUserResource\RelationManagers;
use App\Models\RoomUser;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoomUserResource extends Resource
{
    protected static ?string $model = RoomUser::class; 

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Petugas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        BelongsToSelect::make('room_id')->label('Room')->relationship('room', 'code')->preload()->required(),
                        belongsToSelect::make('user_id')->label('User')->relationship('user', 'name')->preload()->required()->default(auth()->user()->id),
                        TextInput::make('poin')->label('Poin')->numeric()->required(),
                        
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('room.code')
                    ->label('Room')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('poin')
                    ->label('Poin')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListRoomUsers::route('/'),
            'create' => Pages\CreateRoomUser::route('/create'),
            'edit' => Pages\EditRoomUser::route('/{record}/edit'),
        ];
    }
}
