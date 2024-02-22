<?php

namespace App\Filament\Resources\OrdererResource\Pages;

use App\Filament\Resources\OrdererResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderers extends ListRecords
{
    protected static string $resource = OrdererResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
