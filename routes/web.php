<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [LoginController::class, 'index']);
Route::post('/login-user', [LoginController::class, 'loginUser']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard']);

    //arsip surat
    Route::get('/arsip-surat', [ArsipSuratController::class, 'index']);
    Route::get('/arsip-surat/create', [ArsipSuratController::class, 'create']);
    Route::post('/arsip-surat/store', [ArsipSuratController::class, 'store']);
    Route::get('/arsip-surat/edit/{id}', [ArsipSuratController::class, 'edit']);
    Route::post('/arsip-surat/update/{id}', [ArsipSuratController::class, 'update']);
    Route::get('/arsip-surat/delete/{id}', [ArsipSuratController::class, 'delete']);

    //kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/kategori/create', [KategoriController::class, 'create']);
    Route::post('/kategori/store', [KategoriController::class, 'store']);
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
    Route::post('/kategori/update/{id}', [KategoriController::class, 'update']);
    Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete']);

    Route::get('/logout', [LoginController::class, 'logout']);
});