<?php

namespace App\Http\Resources\Room;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array{id: mixed, room_status: mixed, boardinghouse: mixed, room_type: mixed, code: mixed, note: mixed}
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'room_status' => $this->whenLoaded('roomStatus')->name,
            'boarding_house' => $this->whenLoaded('boardingHouse')->name,
            'room_type' => $this->whenLoaded('roomType')->name,
            'code' => $this->code,
            'note' => $this->note,
        ];
    }
}
