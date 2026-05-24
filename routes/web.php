<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/','/barang');

Route::resource('barang', BarangController::class);
Route::resource('user', UserController::class);
Route::resource('lokasi', LokasiController::class)->except('show');
Route::resource('kategori', KategoriController::class)->except('show');
Route::resource('peminjaman', PeminjamanController::class);
