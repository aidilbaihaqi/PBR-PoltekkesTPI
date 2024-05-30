<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('peminjaman_barangs', function(Blueprint $table) {
            $table->foreign('kode_barang')
            ->references('kode_barang')
            ->on('barangs');
        });
        Schema::table('peminjaman_ruangs', function(Blueprint $table) {
            $table->foreign('kode_ruang')
            ->references('kode_ruang')
            ->on('ruangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
