<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $roomId = 115;
        $restId = 0;
        $gender = fake('id_ID')->randomElement(['L', 'P']);
        for ($i = 0; $i < 30; $i++) {
            if ($i % 3 == 0) {
                $roomId++;
                $gender = fake('id_ID')->randomElement(['L', 'P']);
            }
            if ($i % 6 == 0) {
                $restId++;
            }
            $data[] = [
                'reservation_id' => $restId,
                'room_id' => $roomId,
                'name' => fake('id_ID')->name(),
                'gender' => $gender,
                'phone' => "08171" . $i . "572" . $i . "1",
                'address' => fake('id_ID')->address(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Customer::insert($data);
    }
}
