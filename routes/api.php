<?php

use App\Http\Controllers\Api\KelasController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(Authenticate::using('sanctum'));

//posts
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);
//Kelas
Route::apiResource('/kelas', App\Http\Controllers\Api\KelasController::class);
//spp
Route::apiResource('/siswa', App\Http\Controllers\Api\SiswaController::class);
//pembayaran
Route::apiResource('/pembayaran', App\Http\Controllers\Api\PembayaranController::class);