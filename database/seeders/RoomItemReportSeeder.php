<?php

namespace Database\Seeders;

use App\Models\RoomItem;
use App\Models\RoomItemReport;
use Illuminate\Database\Seeder;
use Random\RandomException;

class RoomItemReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws RandomException
     */
    public function run(): void
    {
        $rim = RoomItem::count();
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'room_item_id' => random_int(1, $rim),
                'user_id' => random_int(2, 4),
                'quantity' => 1,
                'status' => fake()->randomElement(['hilang', 'rusak']),
                'note' => fake()->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        RoomItemReport::insert($data);
    }
}
