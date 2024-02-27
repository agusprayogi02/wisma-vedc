<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-101',
                'room_type_id' => 2,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-102',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-103',
                'room_type_id' =>2,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-104',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-105',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-201',
                'room_type_id' => 2,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-202',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-203',
                'room_type_id' => 2,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-204',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-RBS',
                'room_type_id' => 1,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-206',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-207',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-208',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-209',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-210',
                'room_type_id' => 2,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-211',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-212',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-301',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-302',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-303',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-304',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-305',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-306',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-307',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-308',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-309',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-310',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-311',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 1,
                'code' => 'GBH-312',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-101',
                'room_type_id' => 3,

            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-102',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-103',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-104',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-105',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-106',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-107',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-108',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-RBS',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-110',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-111',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-112',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-113',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-114',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-115',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-201',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-202',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-203',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-204',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-205',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-206',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-207',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-208',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-209',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-210',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-211',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-212',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-213',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-214',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 2,
                'code' => 'KD-215',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-RBS',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-102',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-103',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-104',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-105',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-106',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-107',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-108',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-109',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-110',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-111',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-112',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-113',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-114',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-201',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-202',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-203',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-204',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-205',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-206',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-207',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-208',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-209',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-210',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-211',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-212',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-213',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-214',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 3,
                'code' => 'KU-215',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-101',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-102',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-103',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-104',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-105',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-106',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-107',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-108',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-109',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-110',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-111',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-112',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-201',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-202',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-203',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-204',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-205',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-206',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-207',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-208',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-209',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-210',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-211',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 4,
                'code' => 'KA-212',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 5,
                'code' => 'PAV-101',
                'room_type_id' => 1,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 5,
                'code' => 'PAV-102',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 5,
                'code' => 'PAV-103',
                'room_type_id' => 3,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-101',
                'room_type_id' => 4,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-102',
                'room_type_id' => 4,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-103',
                'room_type_id' => 4,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-104',
                'room_type_id' => 4,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-105',
                'room_type_id' => 4,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-RBS',
                'room_type_id' => 4,
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-107',
                'room_type_id' => 4
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-108',
                'room_type_id' => 4
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-201',
                'room_type_id' => 4
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-202',
                'room_type_id' => 4
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-203',
                'room_type_id' => 4
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-204',
                'room_type_id' => 4
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-205',
                'room_type_id' => 4
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-206',
                'room_type_id' => 4
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-207',
                'room_type_id' => 4
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 6,
                'code' => 'GH-208',
                'room_type_id' => 4
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-101',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-102',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-103',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-104',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-105',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-106',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-107',
                'room_type_id' => 2
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-108',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-109',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-110',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-111',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-112',
                'room_type_id' => 5
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-201',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-202',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-203',
                'room_type_id' => 5
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-204',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-205',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-206',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-207',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-208',
                'room_type_id' => 2
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-209',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-210',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-211',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-212',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-213',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 7,
                'code' => 'KJ-214',
                'room_type_id' => 1
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 8,
                'code' => 'BG-101',
                'room_type_id' => 2
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 8,
                'code' => 'BG-102',
                'room_type_id' => 2
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 8,
                'code' => 'BG-103',
                'room_type_id' => 2
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 8,
                'code' => 'BG-201',
                'room_type_id' => 2
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 8,
                'code' => 'BG-202',
                'room_type_id' => 2
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 8,
                'code' => 'BG-203',
                'room_type_id' => 2
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 8,
                'code' => 'BG-301',
                'room_type_id' => 2
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 8,
                'code' => 'BG-302',
                'room_type_id' => 2
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 8,
                'code' => 'BG-303',
                'room_type_id' => 3
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 9,
                'code' => 'EX-01',
                'room_type_id' => 4
            ],
            [
                'room_status_id' => 1,
                'boarding_house_id' => 10,
                'code' => 'EX-02',
                'room_type_id' => 4
            ]
        ];
        DB::table('rooms')->insert($rooms);
        }
    }

