<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            [
                'name'=> 'Single Room',
                'capacity'=> 1,
                'price'=> 0,
                'is_recommended'=> 1,
                'note'=> ''
            ],
            [
                'name'=> 'Double Room',
                'capacity'=> 2,
                'price'=> 0,
                'is_recommended'=> 1,
                'note'=> ''
            ],
            [
                'name'=> 'Twin Room',
                'capacity'=> 2,
                'price'=> 0,
                'is_recommended'=> 1,
                'note'=> ''
            ],
            [
                'name'=> 'Triple Room', 
                'capacity'=> 3,
                'price'=> 0,
                'is_recommended'=> 1,
                'note'=> ''
            ],
            [
                'name'=> 'Double + Double Room',
                'capacity'=> 4,
                'price'=> 0,
                'is_recommended'=> 1,
                'note'=> ''
            ],
        ];
        DB::table('room_types')->insert($roomTypes);
    }
}
