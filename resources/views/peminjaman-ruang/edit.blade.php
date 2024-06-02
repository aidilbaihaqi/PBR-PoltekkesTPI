@extends('layout.main');

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $title }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a> > <a href="{{ route('peminjaman-ruang.index') }}">Data Peminjaman Ruang</a> > {{ $title }}</li>
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
                <form action="{{ route('peminjaman-ruang.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <input type="hidden" name="kode_ruang" value="{{ $data->kode_ruang }}">
                    <div class="form-group mb-2">
                      <label for="kode_ruang">Nama Ruang</label>
                      <select class="form-select" name="kode_ruang">
                        <option selected disabled>Kode ruang terpilih : {{ $data->kode_ruang }}</option>
                        @foreach ($ruang as $b)
                        <option value="{{ $b->kode_ruang }}" >{{ $b->nama_ruang }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group mb-2">
                      <label for="nama_peminjam">Nama Peminjam</label>
                      <input type="text" class="form-control" name="nama_peminjam" value="{{ $data->nama_peminjam }}" id="nama_peminjam" required>
                    </div>
                    <div>
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Peminjaman
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="birthday" name="tgl_peminjaman" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" value="{{ $data->tgl_peminjaman }}" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" disabled>
                        <script>
                          function timeFunctionLong(input) {
                            setTimeout(function() {
                              input.type = 'text';
                            }, 60000);
                          }
                        </script>
                      </div>
                    </div>
                    <div>
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Pengembalian
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="birthday" name="tgl_pengembalian" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" value="{{ $data->tgl_pengembalian }}" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                        <script>
                          function timeFunctionLong(input) {
                            setTimeout(function() {
                              input.type = 'text';
                            }, 60000);
                          }
                        </script>
                      </div>
                    </div>
                    <div class="form-group mb-2">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Status Peminjaman
                      </label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_peminjaman" id="status_peminjaman" value="{{ 1 }}" {{ $data->status_peminjaman == 1 ? 'Checked' : '' }}>
                        <label class="form-check-label" for="status_peminjaman">
                          Telah dikembalikan
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_peminjaman" id="status_peminjaman" value="{{ 0 }}" {{ $data->status_peminjaman == 0 ? 'Checked' : '' }}>
                        <label class="form-check-label" for="status_peminjaman">
                          Belum dikembalikan
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