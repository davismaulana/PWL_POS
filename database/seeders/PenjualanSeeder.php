<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'John Doe',
                'penjualan_kode' => 'PJ001',
                'penjualan_tanggal' => '2022-01-01',
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Davis',
                'penjualan_kode' => 'PJ002',
                'penjualan_tanggal' => '2022-01-02',
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Mike',
                'penjualan_kode' => 'PJ003',
                'penjualan_tanggal' => '2022-01-03',
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Bagas',
                'penjualan_kode' => 'PJ004',
                'penjualan_tanggal' => '2022-01-04',
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Udin',
                'penjualan_kode' => 'PJ005',
                'penjualan_tanggal' => '2022-01-05',
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Joko',
                'penjualan_kode' => 'PJ006',
                'penjualan_tanggal' => '2022-01-06',
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Budi',
                'penjualan_kode' => 'PJ007',
                'penjualan_tanggal' => '2022-01-07',
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Andi',
                'penjualan_kode' => 'PJ008',
                'penjualan_tanggal' => '2022-01-08',
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Caca',
                'penjualan_kode' => 'PJ009',
                'penjualan_tanggal' => '2022-01-09',
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Dedi',
                'penjualan_kode' => 'PJ010',
                'penjualan_tanggal' => '2022-01-10',
            ]
        ];  
        DB::table('t_penjualan')->insert($data);
    }
}
