<?php

namespace App\Filament\Resources\OrdererResource\Pages;

use App\Filament\Resources\OrdererResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderer extends EditRecord
{
    protected static string $resource = OrdererResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
