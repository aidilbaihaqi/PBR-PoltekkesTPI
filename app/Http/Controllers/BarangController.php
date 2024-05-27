<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index() {
        $data = Barang::all();
        return view('barang.index', [
            'title' => 'Data Barang',
            'data' => $data
        ]);
    }

    public function create() {
        return view('barang.create', [
            'title' => 'Tambah Data Barang'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama_barang' => 'required|max:100',
            'deskripsi_barang',
            'status_barang',
            'stok' => 'required'
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')
                        ->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit(Barang $id) {
        $data = Barang::findOrFail($id)->get();
        return view('barang.edit', [
            'title' => 'Edit Data Barang',
            'data' => $data
        ]);
    }

    public function update(Request $request, Barang $id) {
        $request->validate([
            'nama_barang' => 'required|max:100',
            'deskripsi_barang',
            'status_barang' => 'required',
            'stok' => 'required'
        ]);

        $data = Barang::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('barang.index')
                        ->with('success', 'Barang berhasil diubah!');
    }

    public function destroy($id) {
        $data = Barang::findOrFail($id);
        $data->delete();

        return redirect()->route('barang.index')
                        ->with('success', 'Barang berhasil dihapus!');
    }
}
