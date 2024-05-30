<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuang;
use Illuminate\Http\Request;
use App\Models\Ruang;
use Illuminate\Support\Facades\Validator;

class PeminjamanRuangController extends Controller
{
    public function index() {
        $data = PeminjamanRuang::all();
        return view('peminjaman-ruang.index', [
            'title' => 'Data Peminjaman Ruang',
            'data' => $data
        ]);
    }

    public function create() {
        $data = Ruang::all();
        return view('peminjaman-ruang.create', [
            'title' => 'Tambah Peminjaman ruang',
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validated = Validator::make($request->all(), [
            'kode_ruang' => 'required',
            'nama_peminjam' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required'
        ]);

        if($validated->fails()) {
            echo 'gagal validasi';
        }

        PeminjamanRuang::create($request->all());

        return redirect()->route('peminjaman-ruang.index')
                        ->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    public function edit($id) {
        $ruang = Ruang::all();
        $data = PeminjamanRuang::findOrFail($id);
        return view('peminjaman-ruang.edit', [
            'title' => 'Ubah Peminjaman Ruang',
            'data' => $data,
            'ruang' => $ruang
        ]);
    }

    public function update(Request $request, $id) {
        $validated = Validator::make($request->all(), [
            'kode_ruang' => 'required',
            'nama_peminjam' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required'
        ]);

        $data = PeminjamanRuang::find($id);
        $data->update($request->all());

        return redirect()->route('peminjaman-ruang.index')
                        ->with('success', 'Peminjaman berhasil diubah!');
    }

    public function destroy($id) {
        $data = PeminjamanRuang::findOrFail($id);
        $data->delete();

        return redirect()->route('peminjaman-ruang.index')
                        ->with('success', 'Peminjaman berhasil dihapus!');
    }
}
