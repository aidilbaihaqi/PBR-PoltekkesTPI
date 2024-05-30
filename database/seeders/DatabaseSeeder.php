<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\PeminjamanBarang;
use App\Models\Ruang;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Data Barang
        Barang::create([
            'kode_barang' => 'ITM-01',
            'nama_barang' => 'Macbook',
            'deskripsi_barang' => 'Laptop bertipe os apple yang digunakan untuk bagian programming dan desain, tidak bisa dibuat ngegame',
            'status_barang' => 1,
            'stok' => 76
        ]);

        // Data Ruang
        Ruang::create([
            'kode_ruang' => 'RNG-01',
            'nama_ruang' => 'Auditorium',
            'lokasi_ruang' => 'Gedung A',
            'kapasitas' => 20,
            'status_ruang' => 1
        ]);

        // Data Peminjaman Barang
        PeminjamanBarang::create([
            'kode_barang' => 'ITM-01',
            'nama_peminjam' => 'Yelisha',
            'tgl_peminjaman' => '2020-11-21',
            'tgl_pengembalian' => '2020-11-29',
            'status_peminjaman' => 0
        ]);
    }
}
