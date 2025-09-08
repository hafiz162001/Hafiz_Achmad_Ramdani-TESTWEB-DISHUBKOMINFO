<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\UnitKerjaController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (pakai Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::apiResource('pegawais', PegawaiController::class);
    Route::apiResource('jabatans', JabatanController::class);
    Route::apiResource('skpds', SkpdController::class);
    Route::apiResource('unitkerjas', UnitKerjaController::class);
});
