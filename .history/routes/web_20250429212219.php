<?php

use App\Http\Controllers\VehicleController;
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

Route::get('/vehicle', [VehicleController::class, 'index']);
Route::get('/vehicle/create', [VehicleController::class, 'create']);
Route::get('/vehicle/{id}', [VehicleController::class, 'edit']);
Route::post('/vehicle', [VehicleController::class, 'store']);
Route::put('/vehicle/{id}', [VehicleController::class, 'update']);
Route::delete('/vehicle/{id}', [VehicleController::class, 'destroy']);

Route::get('/vehicle/{id}/pinjam', [VehicleController::class, 'showPinjamForm']);
Route::put('/vehicle/{id}/pinjam', [VehicleController::class, 'pinjam']);
