<?php

namespace App\Filament\Resources\RoomItemResource\Pages;

use App\Filament\Resources\RoomItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoomItems extends ListRecords
{
    protected static string $resource = RoomItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
