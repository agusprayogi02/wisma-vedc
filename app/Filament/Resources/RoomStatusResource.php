<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomStatusResource\Pages;
use App\Filament\Resources\RoomStatusResource\RelationManagers;
use App\Models\RoomStatus;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomStatusResource extends Resource
{
    protected static ?string $model = RoomStatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $pluralModelLabel = 'Status Ruangan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->name('Nama'),
                Textarea::make('description')->required()->name('Deksripsi'),
                ColorPicker::make('color')->name('Warna'),
                Toggle::make('is_active')->default(true)->name('Status Aktif'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ColorColumn::make('color')->label('Warna'),
                TextColumn::make('name')->searchable()->sortable()->label('Nama'),
                TextColumn::make('description')->searchable()->sortable()->label('Deskripsi')->wrap(),
                BooleanColumn::make('is_active')->label('Status Aktif'),
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
            'index' => Pages\ListRoomStatuses::route('/'),
            'create' => Pages\CreateRoomStatus::route('/create'),
            'edit' => Pages\EditRoomStatus::route('/{record}/edit'),
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
