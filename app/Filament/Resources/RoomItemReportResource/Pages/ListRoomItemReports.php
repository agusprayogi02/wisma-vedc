<?php

namespace App\Filament\Resources\RoomItemReportResource\Pages;

use App\Filament\Resources\RoomItemReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoomItemReports extends ListRecords
{
    protected static string $resource = RoomItemReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
