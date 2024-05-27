<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use App\Filament\Resources\ReservationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->user()->id;
        return $data;
    }

    protected function afterCreate(): void
    {
        $data = $this->form->getState();
        if (isset($data["rooms"])) {
            $this->record->rooms()->attach($data["rooms"]);
        }
    }
}
