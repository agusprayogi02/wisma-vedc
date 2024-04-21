<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomUser;
use Illuminate\Database\Seeder;
use Random\RandomException;

class RoomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws RandomException
     */
    public function run(): void
    {
        $rm = Room::count();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'room_id' => random_int(1, $rm),
                'room_status_id' => random_int(1, 3),
                'user_id' => random_int(2, 4),
                'poin' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        RoomUser::insert($data);
    }
}
