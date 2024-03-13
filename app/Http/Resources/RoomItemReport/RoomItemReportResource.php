<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomItemReport extends JsonResource
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
            'room_item_id' => $this->whenLoaded('roomItem')->name,
            'user_id' => $this->whenLoaded('user')->name,
            'quantity' => $this->quantity,
            'status' => $this->status,
        ];
    }
}