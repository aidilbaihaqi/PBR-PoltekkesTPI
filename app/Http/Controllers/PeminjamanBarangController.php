<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PeminjamanBarang;
use Illuminate\Http\Request;

class PeminjamanBarangController extends Controller
{
    public function index() {
        $data = PeminjamanBarang::all();
        return view('peminjaman-barang.index', [
            'title' => 'Data Peminjaman Barang',
            'data' => $data
        ]);
    }

    public function create() {
        $data = Barang::all();
        return view('peminjaman-barang.create', [
            'title' => 'Tambah Peminjaman Barang',
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'kode_barang',
            'nama_peminjam',
            'tgl_peminjam',
            'tgl_pengembalian',
            'status_peminjaman'
        ]);

        PeminjamanBarang::create($request->all());

        return redirect()->route('peminjaman-barang.index')
                        ->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    public function edit($id) {
        $barang = Barang::all();
        $data = PeminjamanBarang::findOrFail($id)->first();
        return view('peminjaman-barang.edit', [
            'title' => 'Ubah Peminjaman Barang',
            'data' => $data,
            'barang' => $barang
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'id_barang',
            'nama_peminjam',
            'tgl_peminjam',
            'tgl_pengembalian',
            'status_peminjaman'
        ]);

        $data = PeminjamanBarang::find($id);
        $data->update($request->all());

        return redirect()->route('peminjaman-barang.index')
                        ->with('success', 'Peminjaman berhasil diubah!');
    }

    public function destroy($id) {
        $data = PeminjamanBarang::findOrFail($id);
        $data->delete();

        return redirect()->route('peminjaman-barang.index')
                        ->with('success', 'Peminjaman berhasil dihapus!');
    }
}
