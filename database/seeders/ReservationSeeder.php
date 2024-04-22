<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Random\RandomException;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws RandomException
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'nick_name' => fake('id_ID')->jobTitle,
                'orderer_id' => random_int(1, 10),
                'user_id' => 5,
                'quantity' => 6,
                'type' => fake()->randomElement(['PNBP', 'DIPA']),
                'date_order' => now(),
                'date_ci' => now()->addDays(random_int(1, 4)),
                'date_co' => now()->addDays(random_int(4, 8)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Reservation::insert($data);
    }
}
