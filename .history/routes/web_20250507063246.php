<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// routes/web.php
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Kendaraan
Route::post('/kendaraan', [KendaraanController::class, 'store']);
Route::put('/kendaraan/{id}', [KendaraanController::class, 'update']);
Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy']);

// Peminjaman
Route::post('/peminjaman', [PeminjamanController::class, 'store']);
Route::post('/peminjaman/{id}/selesai', [PeminjamanController::class, 'selesaikan']);
