@extends('layout.main');

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $title }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a> > {{ $title }}</li>
        </ol>
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
                    <a href="{{ route('barang.create') }}" class="btn btn-sm btn-primary">Tambah data</a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Status Barang</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama_barang }}</td>
                            <td>{{ $d->stok }}</td>
                            <td>
                                @if ($d->status_barang == 1)
                                <button class="btn btn-sm btn-success" disabled>Tersedia</button>
                                @else
                                <button class="btn btn-sm btn-secondary" disabled>Tidak Tersedia</button>
                                @endif
                            </td>
                            <td>{!! $d->deskripsi_barang !!}</td>
                            <td>
                                <a href="{{ route('barang.destroy', $d->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="{{ route('barang.edit', $d->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil"></i></a>
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