<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(BarangController::class)->group(function() {
  Route::get('/barang', 'index')->name('barang.index');
  Route::get('/barang/tambah' , 'create')->name('barang.create');
  Route::post('/barang/tambah', 'store')->name('barang.store');
  Route::get('/barang/edit/{id}', 'edit')->name('barang.edit');
  Route::post('/barang/edit/{id}', 'update')->name('barang.update');
  Route::get('/barang/hapus/{id}', 'destroy')->name('barang.destroy');
});
