<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Head',
            'email' => 'head@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Keeper',
            'email' => 'keeper@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Guest',
            'email' => 'guest@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);

        $this->call([
            BoardingHousesSeeder::class,
            RoomStatusesSeeder::class,
            RoomTypesSeeder::class,
            RoomSeeder::class,
            ItemSeeder::class,
            OrdererSeeder::class
        ]);
    }
}
