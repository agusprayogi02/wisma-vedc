<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Keeper 1',
            'email' => 'keeper1@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Keeper 2',
            'email' => 'keeper2@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Keeper 3',
            'email' => 'keeper3@mail.com',
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
            'name' => 'Guest',
            'email' => 'guest@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
    }
}
