<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER kurangi_stok_setelah_peminjaman
        AFTER INSERT ON peminjaman_barangs
        FOR EACH ROW
        BEGIN
            UPDATE barangs
            SET stok = stok - NEW.jmlh
            WHERE kode_barang = NEW.kode_barang;
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `kurangi_stok_setelah_peminjaman`');
    }
};
