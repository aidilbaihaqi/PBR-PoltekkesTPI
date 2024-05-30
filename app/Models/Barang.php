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
        'nama_barang',
        'deskripsi_barang',
        'status_barang',
        'stok'
    ];

    public function peminjamanruang(): BelongsTo {
        return $this->belongsTo(PeminjamanRuang::class);
    }
}
