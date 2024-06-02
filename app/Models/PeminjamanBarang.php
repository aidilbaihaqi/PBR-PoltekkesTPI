<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PeminjamanBarang extends Model
{
    protected $fillable = [
        'kode_barang',
        'nama_peminjam',
        'jmlh',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status_peminjaman'
    ];

    public function barang(): BelongsTo {
        return $this->belongsTo(Barang::class);
    }
}
