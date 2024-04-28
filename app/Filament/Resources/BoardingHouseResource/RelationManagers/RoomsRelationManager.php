<?php

namespace App\Filament\Resources\BoardingHouseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RoomsRelationManager extends RelationManager
{
    protected static string $relationship = 'rooms';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(10),
                Forms\Components\Select::make('room_status_id')
                    ->relationship('roomStatus', 'name')
                    ->label("Status Ruangan")
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('room_type_id')
                    ->relationship('roomType', 'name')
                    ->label("Tipe Ruangan")
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Textarea::make('note')
                    ->label('Catatan')
                    ->nullable(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('code')
            ->columns([
                Tables\Columns\TextColumn::make('code')->label('Kode Ruangan')->searchable()->sortable(),
                TextColumn::make('roomStatus.name')
                    ->label("Status Ruangan")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('roomType.name')
                    ->label("Tipe Ruangan")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('note')
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
