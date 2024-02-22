<?php

namespace App\Filament\Resources\RoomItemResource\Pages;

use App\Filament\Resources\RoomItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRoomItem extends EditRecord
{
    protected static string $resource = RoomItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
