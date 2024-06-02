<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\PeminjamanBarang;
use App\Models\PeminjamanRuang;
use App\Models\Ruang;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Administrator
        User::create([
            'name' => 'Admin Poltekkes',
            'email' => 'admin@poltekkes-tanjungpinang.ac.id',
            'password' => Hash::make('admin123')
        ]);

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
        Ruang::create([
            'kode_ruang' => 'RNG-02',
            'nama_ruang' => 'Kelas A',
            'lokasi_ruang' => 'Gedung B',
            'kapasitas' => 20,
            'status_ruang' => 1
        ]);

        // Data Peminjaman Barang
        PeminjamanBarang::create([
            'kode_barang' => 'ITM-01',
            'nama_peminjam' => 'Yelisha',
            'jmlh' => 2,
            'tgl_peminjaman' => '2020-11-21',
            'tgl_pengembalian' => '2020-11-29',
            'status_peminjaman' => 0
        ]);

        // Data Peminjaman Ruang
        PeminjamanRuang::create([
            'kode_ruang' => 'RNG-01',
            'nama_peminjam' => 'Udin',
            'tgl_peminjaman' => '2020-11-21',
            'tgl_pengembalian' => '2020-11-29',
            'status_peminjaman' => 0
        ]);
    }
}
