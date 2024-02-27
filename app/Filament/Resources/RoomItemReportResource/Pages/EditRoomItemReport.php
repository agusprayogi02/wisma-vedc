<?php

namespace App\Filament\Resources\RoomItemReportResource\Pages;

use App\Filament\Resources\RoomItemReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRoomItemReport extends EditRecord
{
    protected static string $resource = RoomItemReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
