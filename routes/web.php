<?php

use App\Http\Controllers\ChartOfAccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaliMuridController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('master.')->prefix('master')->group(function () {
        Route::resource('siswa', SiswaController::class);
        Route::resource('wali_murid', WaliMuridController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('account', ChartOfAccountController::class)->parameter('account', 'chartOfAccount');
        Route::resource('user', UserController::class);
    });

    Route::resource('transaksi', TransaksiController::class)->only(['index', 'store']);

    Route::get('transaksi/pendapatan', [TransaksiController::class, 'pendapatan'])->name('transaksi.pendapatan');
    Route::post('transaksi/pendapatan', [TransaksiController::class, 'store_pendapatan'])->name('transaksi.store_pendapatan');
    Route::get('print-spp', [TransaksiController::class, 'stream_spp'])->name('stream-spp');
});

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
