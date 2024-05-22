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
            $table->foreign('id_barang')
            ->references('id')
            ->on('barangs')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
        Schema::table('peminjaman_ruangs', function(Blueprint $table) {
            $table->foreign('id_ruang')
            ->references('id')
            ->on('ruangs')
            ->onDelete('restrict')
            ->onUpdate('restrict');
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
