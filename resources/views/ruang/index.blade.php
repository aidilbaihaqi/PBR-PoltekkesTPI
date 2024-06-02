@extends('layout.main');

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $title }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a> > {{ $title }}</li>
        </ol>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-body">
                <h6>Berikut adalah {{ Str::lower($title) }} terupdate. </h6>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    {{ $title }}
                </div>
                <div>
                    <a href="{{ route('ruang.create') }}" class="btn btn-sm btn-primary">Tambah data</a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Kode Ruang</th>
                            <th>Nama Ruang</th>
                            <th>Lokasi Ruang</th>
                            <th>Kapasitas</th>
                            <th>Status Ruang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->kode_ruang }}</td>
                            <td>{{ $d->nama_ruang }}</td>
                            <td>{{ $d->lokasi_ruang }}</td>
                            <td>{{ $d->kapasitas }}</td>
                            <td>
                                @if ($d->status_ruang == 1)
                                <button class="btn btn-sm btn-success" disabled>Tersedia</button>
                                @else
                                <button class="btn btn-sm btn-secondary" disabled>Tidak Tersedia</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('ruang.destroy', $d->kode_ruang) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="{{ route('ruang.edit', $d->kode_ruang) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil"></i></a>
                            </td>
                        </tr>  
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</main>
@endsection