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

        $nama_peminjam = $request->nama_peminjam;
        $kode_ruang = $request->kode_ruang;
        $cek = PeminjamanRuang::where('nama_peminjam', $nama_peminjam)
                                ->where('status_peminjaman', 0)
                                ->first();
        $cekKesediaan = Ruang::where('kode_ruang', $kode_ruang)
                            ->where('status_ruang', 0)->first();

        if($cek) {
            return redirect()->route('peminjaman-ruang.index')
                        ->with('failed', 'Peminjam belum mengembalikan ruang sebelumnya!');
        }
        if($cekKesediaan) {
            return redirect()->route('peminjaman-ruang.index')
                        ->with('failed', 'Ruang tidak tersedia!');
        }

        PeminjamanRuang::create($request->all());
        $createRuang = Ruang::find($request->kode_ruang);
        $createRuang->update([
            'status_ruang' => 0
        ]);

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

        if($request->status_peminjaman == 1) {
            $temp = Ruang::where('kode_ruang', $request->kode_ruang);
            $temp->update([
                'status_ruang' => 1
            ]);
        }else {
            $temp = Ruang::where('kode_ruang', $request->kode_ruang);
            $temp->update([
                'status_ruang' => 0
            ]);
        }
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
