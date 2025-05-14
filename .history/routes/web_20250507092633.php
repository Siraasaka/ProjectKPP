<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ServisController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Kendaraan
Route::resource('kendaraan', KendaraanController::class)
    ->except(['show', 'create', 'edit']);
// jadi: index, store, update, destroy

// Peminjaman
Route::post('peminjaman', [PeminjamanController::class, 'store'])
    ->name('peminjaman.store');
Route::put('peminjaman/{id}/selesai', [PeminjamanController::class, 'selesai'])
    ->name('peminjaman.selesai');
Route::get('peminjaman/riwayat', [PeminjamanController::class, 'riwayat'])
    ->name('peminjaman.riwayat');

// Servis
Route::post('servis', [ServisController::class, 'store'])
    ->name('servis.store');
Route::put('servis/{id}', [ServisController::class, 'update'])
    ->name('servis.update');
Route::get('servis/jadwal', [ServisController::class, 'jadwal'])
    ->name('servis.jadwal');
