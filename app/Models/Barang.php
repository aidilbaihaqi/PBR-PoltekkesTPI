<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    protected $primaryKey = 'kode_barang';
    protected $keyType = 'string';
    
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'deskripsi_barang',
        'status_barang',
        'stok'
    ];

    public function peminjamanbarang(): BelongsTo {
        return $this->belongsTo(PeminjamanBarang::class);
    }
}
