<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomStatuses = [
            [
                'name' => '0',
                'description' => 'Occupied, kamar yang sedang ditempati oleh sesorang secara sah dan teregister sebagai tamu hotel',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' => 'V',
                'description' => 'Vacant, kamar yang sedang kosong',
                'color' => '',
                'icon' => '',
                'is_active' => 1,
            ],
            [
                'name' => 'OC',
                'description' => 'Occupied Clean, kamar yang sedang ditempati oleh sesorang secara sah dan teregister sebagai tamu hotel pada kamar yang bersih',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' => 'OD',
                'description' => 'Occupied Dirty, kamar yang sedang ditempati oleh sesorang secara sah dan teregister sebagai tamu hotel pada kamar yang kotor',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' => 'VCI',
                'description' => 'Vacant Clean Inspected, kamar kosong yang sudah dibersihkan dan diperiksa oleh floor supervisor dan siap untuk menerima tamu (dijual)',
                'color' => '',
                'icon' => '',
                'is_active' => 1,
            ],
            [
                'name' => 'VC',
                'description' => 'Vacant Clean, kamar kosong yang sudah dibersihkan dan siap untuk menerima tamu (dijual)',
                'color' => '',
                'icon' => '',
                'is_active' => 1,
            ],
            [
                'name' => 'VD',
                'description' => 'Vacant Dirty, kamar kosong yang belum dibersihkan',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name'=> 'COMP', 
                'description' => 'Compliment, Kamar yang tereister oleh tamu hotel namun tidak dikenakan biaya',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name'=> 'HU',
                'description' => 'Kamar yang teregister tetapi digunakan oleh pihak managemen hotel.',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' =>'DND',
                'description' => 'Do Not Disturb, kamar yang sedang ditempati oleh tamu hotel yang tidak ingin diganggu',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'nama'=>'SO',
                'description'=>'Sleep Out, Seorang tamu masih teregister di hotel namun tidak menginap di hotel',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' => 'SKIP',
                'description' => 'Skipper, Tamu meninggalkan hotel sebelum melunasi semua kewajibannya',
                'color' => '',
                'icon' => '',
                'is_active' => 1,
            ],
            [
                'name' => 'OOO',
                'description' => 'Out of Order, kamar yang sedang tidak bisa ditempati oleh tamu hotel karena sedang dalam perbaikan',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' => 'OS',
                'description' => 'Out of Service, kamar yang sedang tidak bisa ditempati oleh tamu hotel karena sedang dalam perbaikan',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' => 'DO/ED',
                'description' => 'Due Out/Expected Departure, Kamar yang diharapkan untuk check-out hari ini sesuai dengan tanggal departure',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' => 'EA',
                'description' => 'Early Arrival, Kamar yang diharapkan untuk check-in hari ini sesuai dengan tanggal arrival',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' => 'CO',
                'description' => 'Check Out, Kamar yang sudah di check-out oleh tamu hotel',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' => 'LCO',
                'description' => 'Late Check Out, Permintaan tamu untuk meninggalkan hotel lebih lambat dari waktu check out yang ditentukan',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' => 'ONL',
                'description' => 'Occupeid No Luggage, Seorang tamu yang masih teregister di hotel namun tidak meninggalkan barang-barangnya di kamar',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ],
            [
                'name' => 'DL',
                'description'=>'Double Lock, Permintaan tamu ke pihak hotel untuk melakukan double lock sehingga tidak seorangpun dapat masuk ke kamar tersebut.',
                'color' => '',
                'icon' => '',
                'is_active' => 0,
            ]
        ];
        DB::table('room_statuses')->insert($roomStatuses);
    }
}
