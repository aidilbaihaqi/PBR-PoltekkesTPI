@extends('layout.main');

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $title }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a> > <a href="{{ route('barang.index') }}">Data Ruang</a> > {{ $title }}</li>
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
                <form action="{{ route('ruang.update', $data->kode_ruang) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group mb-2">
                      <label for="kode_ruang">Kode Ruang</label>
                      <input type="text" class="form-control" name="kode_ruang" value="{{ $data->kode_ruang }}" id="kode_ruang" required disabled>
                    </div>
                    <div class="form-group mb-2">
                      <label for="nama_ruang">Nama Ruang</label>
                      <input type="text" class="form-control" name="nama_ruang" value="{{ $data->nama_ruang }}" id="nama_ruang" required>
                    </div>
                    <div class="form-group mb-2">
                      <label for="lokasi_ruang">Lokasi Ruang</label>
                      <input type="text" class="form-control" name="lokasi_ruang" value="{{ $data->lokasi_ruang }}" id="lokasi_ruang" required>
                    </div>
                    <div class="form-group mb-2">
                      <label for="kapasitas">Kapasitas (<small class="form-text text-muted">Orang</small>)</label>
                      <input type="number" class="form-control" name="kapasitas" value="{{ $data->kapasitas }}" id="kapasitas" required>
                    </div>
                    <div class="form-group mb-2">
                      <label for="">Status Ruang</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_ruang" id="tersedia" value="{{ 1 }}" {{ $data->status_ruang == 1 ? 'Checked' : '' }}>
                        <label class="form-check-label" for="tersedia">
                          Tersedia
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_ruang" id="tidak_tersedia" value="{{ 0 }}" {{ $data->status_ruang == 0 ? 'Checked' : '' }}>
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