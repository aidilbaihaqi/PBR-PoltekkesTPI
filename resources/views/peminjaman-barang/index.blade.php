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
                    <a href="{{ route('peminjaman-barang.create') }}" class="btn btn-sm btn-primary">Tambah data</a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Barang</th>
                            <th>Nama Peminjam</th>
                            <th>Tgl Peminjaman</th>
                            <th>Tgl Pengembalian</th>
                            <th>Status Peminjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->kode_barang }}</td>
                            <td>{{ $d->nama_peminjam }}</td>
                            <td>{{ $d->tgl_peminjaman }}</td>
                            <td>{{ $d->tgl_pengembalian }}</td>
                            <td>
                                @if ($d->status_peminjaman == 1)
                                <button class="btn btn-sm btn-success" disabled>Sudah dikembalikan</button>
                                @else
                                <button class="btn btn-sm btn-secondary" disabled>Belum dikembalikan</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('peminjaman-barang.destroy', $d->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="{{ route('peminjaman-barang.edit', $d->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil"></i></a>
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