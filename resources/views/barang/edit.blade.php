@extends('layout.main');

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $title }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a> > <a href="{{ route('barang.index') }}">Data Barang</a> > {{ $title }}</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <h6>Berikut adalah form {{ Str::lower($title) }}.</h6>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                {{ $title }}
            </div>
            <div class="card-body">
                <form action="{{ route('barang.update', $data->kode_barang) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group mb-2">
                      <label for="kode_barang">Kode Barang</label>
                      <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="{{ $data->kode_barang }}" required disabled>
                    </div>
                    <div class="form-group mb-2">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang" value="{{ $data->nama_barang }}" id="nama_barang" required>
                    </div>
                    <div class="form-group mb-2">
                      <label for="stok">Stok Barang (<small id="emailHelp" class="form-text text-muted">Satuan pcs</small>)</label>
                      <input type="number" class="form-control" name="stok" value="{{ $data->stok }}" id="stok" required>
                    </div>
                    <div class="form-group mb-2">
                      <label for="deskripsi_barang">Deskripsi Barang (<small id="emailHelp" class="form-text text-muted">Optional</small>)</label>
                      <textarea class="form-control" name="deskripsi_barang" id="deskripsi_barang" rows="3">{!! $data->deskripsi_barang !!}</textarea>
                    </div>
                    <div class="form-group mb-2">
                      <label for="nama_barang">Status Barang</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_barang" id="tersedia" value="{{ 1 }}" {{ $data->status_barang == 1 ? 'Checked' : '' }}>
                        <label class="form-check-label" for="tersedia">
                          Tersedia
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_barang" id="tidak_tersedia" value="{{ 0 }}" {{ $data->status_barang == 0 ? 'Checked' : '' }}>
                        <label class="form-check-label" for="tidak_tersedia">
                          Tidak Tersedia
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                  </form>
            </div>
        </div>
        
    </div>
</main>
@endsection