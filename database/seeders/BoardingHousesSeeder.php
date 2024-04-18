<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardingHousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $boardingHouse = [
            [
                'name' => 'Gedung Bima Hall',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gedung Kendedes',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gedung Ken Umang',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gedung Ken Arok',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paviliun',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Guest House',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gedung Kertajaya',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gedung Bima Graha',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hotel Harris Malang',
                'image' => '',
                'note' => '',
                'address' => 'Jl. Ahmad Yani Utara',
                'type' => 'external',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hotel Grand Mercure Malang',
                'image' => '',
                'note' => '',
                'address' => 'Jl. Panji Suroso, Blimbing Malang',
                'type' => 'external',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('boarding_houses')->insert($boardingHouse);
    }
}
