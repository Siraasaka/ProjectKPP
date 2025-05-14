<?php

use App\Http\Controllers\KendaraanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('pages.dashboard');
// });

Route::get('/dashboard', [KendaraanController::class, 'dashboard']);

Route::get('/kendaraan', [KendaraanController::class, 'index']);
Route::get('/kendaraan/create', [KendaraanController::class, 'create']);
Route::get('/kendaraan/{id}', [KendaraanController::class, 'edit']);
Route::post('/kendaraan', [KendaraanController::class, 'store']);
Route::put('/kendaraan/{id}', [KendaraanController::class, 'update']);
Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy']);

Route::get('/kendaraan/{id}/pinjam', [KendaraanController::class, 'showPinjamForm']);
Route::put('/kendaraan/{id}/pinjam', [KendaraanController::class, 'pinjam']);
