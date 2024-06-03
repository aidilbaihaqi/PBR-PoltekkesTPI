<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PeminjamanBarang;
use App\Models\PeminjamanRuang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Prompts\Table;

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

        $nama_peminjam = $request->nama_peminjam;
        $kode_barang = $request->kode_barang;
        $cek = PeminjamanBarang::where('nama_peminjam', $nama_peminjam)
                                ->where('status_peminjaman', 0)
                                ->first();
        $cekStok = Barang::where('kode_barang', $kode_barang)
                        ->where('stok', 0)->first();

        if($cek) {
            return redirect()->route('peminjaman-barang.index')
                        ->with('failed', 'Peminjam belum mengembalikan barang sebelumnya!');
        }
        if($cekStok) {
            return redirect()->route('peminjaman-barang.index')
                        ->with('failed', 'Stok barang tidak ada!');
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
            'jmlh' => 'required',
            'nama_peminjam' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required'
        ]);

        $data = PeminjamanBarang::find($id);
        $cekStok = Barang::where('kode_barang', $data->kode_barang)->where('stok', 0)->first();

        if($cekStok) {
            return redirect()->route('peminjaman-barang.index')
                        ->with('failed', 'Stok barang tidak ada!');
        }

        if($request->status_peminjaman == 1) {
            $barang = Barang::where('kode_barang', $data->kode_barang)->first();
            $stok = $barang->stok;
            
            $barang->update([
                'stok' => $stok += $data->jmlh
            ]);
            $data->delete();

            return redirect()->route('peminjaman-barang.index')
            ->with('success', 'Peminjaman berhasil diubah dan data telah dihapus!');
        }

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
