<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'room_status' => $this->room_status,
            'boardinghouse' => $this->boardinghouse,
            'room_type' => $this->room_type,
            'code' => $this->code,
            'note' => $this->note,
        ];
    }
}
