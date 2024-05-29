<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Data Barang
Route::controller(BarangController::class)->group(function() {
  Route::get('/barang', 'index')->name('barang.index');
  Route::get('/barang/tambah' , 'create')->name('barang.create');
  Route::post('/barang/tambah', 'store')->name('barang.store');
  Route::get('/barang/edit/{id}', 'edit')->name('barang.edit');
  Route::post('/barang/edit/{id}', 'update')->name('barang.update');
  Route::get('/barang/hapus/{id}', 'destroy')->name('barang.destroy');
});

// Data Ruang
Route::controller(RuangController::class)->group(function() {
  Route::get('/ruang', 'index')->name('ruang.index');
  Route::get('/ruang/tambah' , 'create')->name('ruang.create');
  Route::post('/ruang/tambah', 'store')->name('ruang.store');
  Route::get('/ruang/edit/{id}', 'edit')->name('ruang.edit');
  Route::post('/ruang/edit/{id}', 'update')->name('ruang.update');
  Route::get('/ruang/hapus/{id}', 'destroy')->name('ruang.destroy');
});
