<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ShieldSeeder::class,
            UserSeeder::class,
            BoardingHousesSeeder::class,
            RoomStatusesSeeder::class,
            RoomTypesSeeder::class,
            RoomSeeder::class,
            ItemSeeder::class,
            OrdererSeeder::class,
            ReservationSeeder::class,
            CustomerSeeder::class,
            RoomItemSeeder::class,
            RoomUserSeeder::class,
            RoomItemReportSeeder::class,
        ]);
    }
}
