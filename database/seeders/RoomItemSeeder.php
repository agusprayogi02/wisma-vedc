<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomItem;
use Illuminate\Database\Seeder;
use Random\RandomException;

class RoomItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws RandomException
     */
    public function run(): void
    {
        $data = [];
        foreach (Room::get() as $room) {
            $data[] = [
                'room_id' => $room->id,
                'item_id' => random_int(1, 10),
                'quantity' => $room->roomType->capacity,
                'status' => 'baik',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        RoomItem::insert($data);
    }
}
