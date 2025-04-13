<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliMuridController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::name('master.')->prefix('master')->group(function () {
    Route::resource('siswa', SiswaController::class);
    Route::resource('wali_murid', WaliMuridController::class);
    Route::resource('guru', GuruController::class);
});