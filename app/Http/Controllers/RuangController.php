<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;

class RuangController extends Controller
{
    public function index() {
        $data = Ruang::all();
        return view('ruang.index', [
            'title' => 'Data Ruang',
            'data' => $data
        ]);
    }

    public function create() {
        return view('ruang.create', [
            'title' => 'Tambah Data Ruang'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama_ruang' => 'required|min:5|max:100',
            'lokasi_ruang' => 'required|min:5|max:100',
            'kapasitas' => 'required',
            'status_ruang'
        ]);

        Ruang::create($request->all());

        return redirect()->route('ruang.index')
                        ->with('success', 'Ruang berhasil ditambahkan!');
    }

    public function edit(Ruang $id) {
        $data = Ruang::findOrFail($id)->get();
        return view('ruang.edit', [
            'title' => 'Edit Data Ruang',
            'data' => $data
        ]);
    }

    public function update(Request $request, Ruang $id) {
        $request->validate([
            'nama_ruang' => 'required|min:5|max:100',
            'lokasi_ruang' => 'required|min:5|max:100',
            'kapasitas' => 'required',
            'status_ruang' => 'required'
        ]);

        $data = Ruang::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('ruang.index')
                        ->with('success', 'Ruang berhasil diubah!');
    }

    public function destroy($id) {
        $data = Ruang::findOrFail($id);
        $data->delete();

        return redirect()->route('ruang.index')
                        ->with('success', 'Ruang berhasil dihapus!');
    }
}
