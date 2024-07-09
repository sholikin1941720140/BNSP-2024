<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AboutController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-user', [LoginController::class, 'loginUser']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard']);

    //arsip surat
    Route::get('/arsip-surat', [ArsipController::class, 'index']);
    Route::get('/arsip-surat/create', [ArsipController::class, 'create']);
    Route::post('/arsip-surat/store', [ArsipController::class, 'store']);
    Route::get('/arsip-surat/show/{id}', [ArsipController::class, 'show']);
    Route::post('/arsip-surat/update/{id}', [ArsipController::class, 'update']);
    Route::get('/arsip-surat/delete/{id}', [ArsipController::class, 'delete']);
    Route::get('/arsip-surat/download/{id}', [ArsipController::class, 'download'])->name('arsip-surat.download');
    Route::get('/show-pdf/{filename}', [ArsipController::class, 'showPdf']);

    //kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/kategori/create', [KategoriController::class, 'create']);
    Route::post('/kategori/store', [KategoriController::class, 'store']);
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
    Route::post('/kategori/update/{id}', [KategoriController::class, 'update']);
    Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete']);

    //about
    Route::get('/about', [AboutController::class, 'index']);

    Route::get('/logout', [LoginController::class, 'logout']);
});