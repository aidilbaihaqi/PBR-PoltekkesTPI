<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PeminjamanRuang extends Model
{
    protected $fillable = [
        'id_ruang',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status_peminjaman'
    ];

    public function ruang(): HasOne {
        return $this->hasOne(Ruang::class);
    }
}
