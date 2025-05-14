<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PeminjamanController;
// use App\Http\Controllers\ServiceController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Kendaraan
Route::resource('kendaraan', KendaraanController::class)->except(['show', 'create', 'edit']);

// eksport
Route::get('/kendaraan/export/{format}', [KendaraanController::class, 'export'])->name('kendaraan.export');

// Peminjaman
Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::post('peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::put('peminjaman/{id}/selesai', [PeminjamanController::class, 'selesai'])->name('peminjaman.selesai');
Route::get('peminjaman/riwayat', [PeminjamanController::class, 'riwayat'])->name('peminjaman.riwayat');
Route::put('/peminjaman/selesai/{id}', [PeminjamanController::class, 'selesaikan'])->name('peminjaman.selesai');


// // Servis
// Route::post('servis', [ServiceController::class, 'store'])->name('servis.store');
// Route::put('servis/{id}', [ServiceController::class, 'update'])->name('servis.update');
// Route::get('servis/jadwal', [ServiceController::class, 'jadwal'])->name('servis.jadwal');
