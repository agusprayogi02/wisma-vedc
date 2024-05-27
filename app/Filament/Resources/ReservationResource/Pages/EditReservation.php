<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use App\Filament\Resources\ReservationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReservation extends EditRecord
{
    protected static string $resource = ReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data["rooms"] = $this->record->rooms->pluck("id")->toArray();
        $data["room_codes"] = $this->record->rooms->pluck("code")->toArray();

        return $data;
    }

    protected function afterCreate(): void
    {
        $data = $this->getRecord();
        if (isset($data["rooms"])) {
            $this->record->rooms()->attach($data["rooms"]);
        }
    }
}
