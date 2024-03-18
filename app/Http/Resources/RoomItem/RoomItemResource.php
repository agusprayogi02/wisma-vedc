<?php

namespace App\Http\Resources\RoomItem;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'room' => $this->whenLoaded('room')->code,
            'item' => $this->whenLoaded('item')->name,
            'quantity' => $this->quantity,
            'note' => $this->note,
        ];
    }
}
