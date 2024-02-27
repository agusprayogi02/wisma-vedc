<?php

namespace Database\Seeders;

use App\Models\BoardingHouse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            ],
            [
                'name' => 'Gedung Kendedes',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
            ],
            [
                'name' => 'Gedung Ken Umang',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
            ],
            [
                'name' => 'Gedung Ken Arok',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
            ],
            [
                'name' => 'Paviliun',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
            ],
            [
                'name' => 'Guest House',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
            ],
            [
                'name' => 'Gedung Kertajaya',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
            ],
            [
                'name' => 'Gedung Bima Graha',
                'image' => '',
                'note' => '',
                'address' => 'Jl Teluk Mandar Tromol Pos 5, Arjosari Malang',
                'type' => 'internal',
            ],
            [
                'name' => 'Hotel Harris Malang',
                'image' => '',
                'note' => '',
                'address' => 'Jl. Ahmad Yani Utara',
                'type' => 'external',
            ],
            [
                'name' => 'Hotel Grand Mercure Malang',
                'image' => '',
                'note' => '',
                'address' => 'Jl. Panji Suroso, Blimbing Malang',
                'type' => 'external',
            ],
        ];
        DB::table('boarding_houses')->insert($boardingHouse);
    }
}
