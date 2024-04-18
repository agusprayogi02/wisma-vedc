<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            [
                'name' => 'Single Room',
                'capacity' => 1,
                'price' => 0,
                'is_recommended' => 1,
                'note' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Double Room',
                'capacity' => 2,
                'price' => 0,
                'is_recommended' => 1,
                'note' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Twin Room',
                'capacity' => 2,
                'price' => 0,
                'is_recommended' => 1,
                'note' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Triple Room',
                'capacity' => 3,
                'price' => 0,
                'is_recommended' => 1,
                'note' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Double + Double Room',
                'capacity' => 4,
                'price' => 0,
                'is_recommended' => 1,
                'note' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('room_types')->insert($roomTypes);
    }
}
