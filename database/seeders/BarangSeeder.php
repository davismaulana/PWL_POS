<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'BR001',
                'barang_nama' => 'Beras',
                'harga_beli' => 8000,
                'harga_jual' => 10000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'MI001',
                'barang_nama' => 'Mie Instan',
                'harga_beli' => 4000,
                'harga_jual' => 5000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'AM001',
                'barang_nama' => 'Air Mineral',
                'harga_beli' => 1500,
                'harga_jual' => 2000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'SD001',
                'barang_nama' => 'Soda',
                'harga_beli' => 2500,
                'harga_jual' => 3000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'KS001',
                'barang_nama' => 'Kaos',
                'harga_beli' => 40000,
                'harga_jual' => 50000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'CL001',
                'barang_nama' => 'Celana',
                'harga_beli' => 60000,
                'harga_jual' => 75000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'HP001',
                'barang_nama' => 'Handphone',
                'harga_beli' => 800000,
                'harga_jual' => 1000000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'LP001',
                'barang_nama' => 'Laptop',
                'harga_beli' => 4000000,
                'harga_jual' => 5000000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'SB001',
                'barang_nama' => 'Sabun',
                'harga_beli' => 4000,
                'harga_jual' => 5000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'SS001',
                'barang_nama' => 'Shampo',
                'harga_beli' => 15000,
                'harga_jual' => 20000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
