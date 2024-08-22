<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PengajuanController;
use App\Http\Controllers\API\SaranController;
use App\Http\Controllers\API\KegiatanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    //Pengajuan
    Route::get('/pengajuan/{id}', [PengajuanController::class, 'select']);
    Route::get('/pengajuan', [PengajuanController::class, 'select']);
    Route::post('/pengajuan', [PengajuanController::class, 'create']);
    Route::put('/pengajuan/{id}', [PengajuanController::class, 'update']);
    Route::delete('/pengajuan/{id}', [PengajuanController::class, 'delete']);

    //Saran
    Route::get('/saran/{id}', [SaranController::class, 'select']);
    Route::get('/saran', [SaranController::class, 'select']);
    Route::post('/saran', [SaranController::class, 'create']);
    Route::put('/saran/{id}', [SaranController::class, 'update']);
    Route::delete('/saran/{id}', [SaranController::class, 'delete']);

    //Kegiatan
    Route::get('/kegiatan/{id}', [KegiatanController::class, 'select']);
    Route::get('/kegiatan', [KegiatanController::class, 'select']);

    //Penduduk
    Route::get('/penduduk', [AuthController::class, 'getAllPenduduk']);
    Route::get('/penduduk/{id}', [AuthController::class, 'getPendudukByNIK']);

    Route::delete('/logout', [AuthController::class, 'logout']);

});



