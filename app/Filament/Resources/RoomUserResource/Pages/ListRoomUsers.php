<?php

namespace App\Filament\Resources\RoomUserResource\Pages;

use App\Filament\Resources\RoomUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoomUsers extends ListRecords
{
    protected static string $resource = RoomUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
