<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ruang extends Model
{
    protected $fillable = [
        'nama_ruang',
        'lokasi_ruang',
        'kapasitas',
        'status_ruang'
    ];

    public function peminjamanruang(): BelongsTo {
        return $this->belongsTo(PeminjamanRuang::class);
    }
}
