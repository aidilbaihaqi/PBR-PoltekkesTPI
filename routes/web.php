<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanBarangController;
use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Data Barang
Route::controller(BarangController::class)->group(function() {
  Route::get('/barang', 'index')->name('barang.index');
  Route::get('/barang/tambah' , 'create')->name('barang.create');
  Route::post('/barang/tambah', 'store')->name('barang.store');
  Route::get('/barang/edit/{kode_barang}', 'edit')->name('barang.edit');
  Route::post('/barang/edit/{kode_barang}', 'update')->name('barang.update');
  Route::get('/barang/hapus/{kode_barang}', 'destroy')->name('barang.destroy');
});

// Data Ruang
Route::controller(RuangController::class)->group(function() {
  Route::get('/ruang', 'index')->name('ruang.index');
  Route::get('/ruang/tambah' , 'create')->name('ruang.create');
  Route::post('/ruang/tambah', 'store')->name('ruang.store');
  Route::get('/ruang/edit/{kode_ruang}', 'edit')->name('ruang.edit');
  Route::post('/ruang/edit/{kode_ruang}', 'update')->name('ruang.update');
  Route::get('/ruang/hapus/{kode_ruang}', 'destroy')->name('ruang.destroy');
});

// Data Peminjaman Barang
Route::controller(PeminjamanBarangController::class)->group(function() {
  Route::get('/peminjaman-barang', 'index')->name('peminjaman-barang.index');
  Route::get('/peminjaman-barang/tambah' , 'create')->name('peminjaman-barang.create');
  Route::post('/peminjaman-barang/tambah', 'store')->name('peminjaman-barang.store');
  Route::get('/peminjaman-barang/edit/{id}', 'edit')->name('peminjaman-barang.edit');
  Route::post('/peminjaman-barang/edit/{id}', 'update')->name('peminjaman-barang.update');
  Route::get('/peminjaman-barang/hapus/{id}', 'destroy')->name('peminjaman-barang.destroy');
});
