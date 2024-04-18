<?php

namespace Database\Seeders;

use App\Models\Orderer;
use Illuminate\Database\Seeder;

class OrdererSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Orderer::create([
                'name' => fake('id_ID')->name(),
                'phone' => "08171" . $i . "572" . $i . "1",
                'address' => fake('id_ID')->address(),
            ]);
        }
    }
}
