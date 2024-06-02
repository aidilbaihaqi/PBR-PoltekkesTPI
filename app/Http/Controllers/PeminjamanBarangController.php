<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PeminjamanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validated = Validator::make($request->all(), [
            'kode_barang' => 'required',
            'nama_peminjam' => 'required',
            'jmlh' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required'
        ]);

        if($validated->fails()) {
            echo 'gagal validasi';
        }

        PeminjamanBarang::create($request->all());

        return redirect()->route('peminjaman-barang.index')
                        ->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    public function edit($id) {
        $barang = Barang::all();
        $data = PeminjamanBarang::findOrFail($id);
        return view('peminjaman-barang.edit', [
            'title' => 'Ubah Peminjaman Barang',
            'data' => $data,
            'barang' => $barang
        ]);
    }

    public function update(Request $request, $id) {
        $validated = Validator::make($request->all(), [
            'kode_barang' => 'required',
            'nama_peminjam' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required'
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
