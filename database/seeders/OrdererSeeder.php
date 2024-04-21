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
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => fake('id_ID')->name(),
                'phone' => "08171" . $i . "572" . $i . "1",
                'address' => fake('id_ID')->address(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Orderer::insert($data);
    }
}
