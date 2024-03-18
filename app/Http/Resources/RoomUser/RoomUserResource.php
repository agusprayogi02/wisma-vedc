<?php

namespace App\Http\Resources\RoomUser;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "room_id" => $this->room_id,
            "user_id" => $this->user_id,
            "poin" => $this->poin,
        ];
    }
}
