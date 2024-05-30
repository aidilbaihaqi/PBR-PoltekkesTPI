<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanBarang;
use App\Models\PeminjamanRuang;

class DashboardController extends Controller
{
    public function index() {
        $barang = PeminjamanBarang::where('status_peminjaman', 0)->get();
        $ruang = PeminjamanRuang::where('status_peminjaman', 0)->get();

        return view('dashboard', [
            'title' => 'Dashboard',
            'barang' => $barang,
            'ruang' => $ruang
        ]);
    }
}
