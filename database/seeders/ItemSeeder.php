<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'code' => 'HD001',
                'name' => 'Hairdryer',
                'note' => 'Hair Dryer Item',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'HT002',
                'name' => 'Handuk',
                'note' => 'Handuk Item',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SL003',
                'name' => 'Selimut',
                'note' => 'Selimut Item',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'PM004',
                'name' => 'Piyama mandi',
                'note' => 'Piyama mandi/mantel mandi Item',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'HB005',
                'name' => 'Hanger baju',
                'note' => 'Hanger baju Item',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'ST006',
                'name' => 'Setrika',
                'note' => 'Setrika Item',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SG007',
                'name' => 'Sendok garpu',
                'note' => 'Sendok garpu Item',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'TC008',
                'name' => 'Teko listrik dan cangkir',
                'note' => 'Teko listrik dan cangkir Item',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SP009',
                'name' => 'Sprei',
                'note' => 'Sprei Item',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'BL010',
                'name' => 'Bantal',
                'note' => 'Bantal Item',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('items')->insert($items);
    }
}
