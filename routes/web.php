<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\UserController;

Route::get('/', [AuthController::class, 'login'])->name('login')->middleware('checkAuth');
Route::post('/', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.dashboard');
    })->middleware('checkRole:admin,user');

    // admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('data-user', [UserController::class, 'index'])->name('data_user');
        Route::get('tambah-user', [UserController::class, 'create'])->name('tambah_user');
        Route::post('tambah-user', [UserController::class, 'store'])->name('store_user');
        Route::get('tambah-user', [UserController::class, 'create'])->name('tambah_user');
        Route::delete('hapus-user/{id}', [UserController::class, 'destroy'])->name('hapus_user');
        Route::get('laporan', [KasController::class, 'laporan'])->name('laporan');
        Route::get('laporan-user', [KasController::class, 'laporan_user'])->name('laporan_user');
        Route::get('laporan/user/{id}', [KasController::class, 'laporan_kas_user'])->name('laporan_kas_user');
    });

    // user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('input-kas', [KasController::class, 'index'])->name('finput-kas');
        Route::post('input-kas', [KasController::class, 'store'])->name('input-kas');
        Route::get('laporan-kas', [KasController::class, 'laporan_kas'])->name('lap-kas');
    });
});