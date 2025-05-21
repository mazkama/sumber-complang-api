<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tiket;

class TiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seeder untuk jenis parkir
        Tiket::create([
            'nama_tiket' => 'Parkir Mobil',
            'harga' => 5000,  // Harga untuk parkir mobil
            'kategori' => 'Mobil',
            'jenis' => 'parkir',
            'deskripsi' => 'Parkir untuk kendaraan mobil.'
        ]);

        Tiket::create([
            'nama_tiket' => 'Parkir Motor',
            'harga' => 3000,  // Harga untuk parkir motor
            'kategori' => 'Motor',
            'jenis' => 'parkir',
            'deskripsi' => 'Parkir untuk kendaraan motor.'
        ]);

        // Seeder untuk jenis kolam
        Tiket::create([
            'nama_tiket' => 'Kolam Anak',
            'harga' => 10000,  // Harga untuk kolam anak
            'kategori' => 'Anak',
            'jenis' => 'kolam',
            'deskripsi' => 'Kolam renang khusus untuk anak-anak.'
        ]);

        Tiket::create([
            'nama_tiket' => 'Kolam Dewasa',
            'harga' => 20000,  // Harga untuk kolam dewasa
            'kategori' => 'Dewasa',
            'jenis' => 'kolam',
            'deskripsi' => 'Kolam renang untuk orang dewasa.'
        ]);
    }
}
