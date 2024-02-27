<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ],
            [
                'code' => 'HT002',
                'name' => 'Handuk',
                'note' => 'Handuk Item',
            ],
            [
                'code' => 'SL003',
                'name' => 'Selimut',
                'note' => 'Selimut Item',
            ],
            [
                'code' => 'PM004',
                'name' => 'Piyama mandi',
                'note' => 'Piyama mandi/mantel mandi Item',
            ],
            [
                'code' => 'HB005',
                'name' => 'Hanger baju',
                'note' => 'Hanger baju Item',
            ],
            [
                'code' => 'ST006',
                'name' => 'Setrika',
                'note' => 'Setrika Item',
            ],
            [
                'code' => 'SG007',
                'name' => 'Sendok garpu',
                'note' => 'Sendok garpu Item',
            ],
            [
                'code' => 'TC008',
                'name' => 'Teko listrik dan cangkir',
                'note' => 'Teko listrik dan cangkir Item',
            ],
            [
                'code' => 'SP009',
                'name' => 'Sprei',
                'note' => 'Sprei Item',
            ],
            [
                'code' => 'BL010',
                'name' => 'Bantal',
                'note' => 'Bantal Item',
            ],
        ];

        DB::table('items')->insert($items);
    }
}
