<?php

namespace Database\Seeders;

use App\Models\Barang;
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
        // User::factory(10)->create();

        // Data Barang
        Barang::create([
            'nama_barang' => 'Macbook',
            'deskripsi_barang' => 'Laptop bertipe os apple yang digunakan untuk bagian programming dan desain, tidak bisa dibuat ngegame',
            'status_barang' => 1,
            'stok' => 76
        ]);
    }
}
