<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('login', function () {
        return view('pages.auth.login');
    })->name('login');
    Route::post('login', 'Auth\LoginController@authenticate')->name('login');
});

Route::middleware('auth')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::prefix('master')->name('master.')->group(function () {
        Route::resource('siswa', 'SiswaController');
        Route::resource('guru', 'GuruController');
        Route::get('jenis-transaksi', 'JenisTransaksiController@index')->name('jenis_transaksi.index');
    });

    Route::prefix('pemasukan')->name('pemasukan.')->group(function () {
        Route::resource('pendaftaran', 'PendaftaranController');
        Route::resource('spp', 'SPPController');
        Route::resource('ujian', 'PembayaranUjianController');
        Route::get('lainnya', 'TransaksiController@index_pemasukan_lainnya')->name('lainnya.index');
    });

    Route::prefix('pengeluaran')->name('pengeluaran.')->group(function () {
        Route::resource('gaji', 'PenggajianController');
        Route::get('lainnya', 'TransaksiController@index_pengeluaran_lainnya')->name('lainnya.index');
    });

    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/', 'LaporanController@index')->name('index');
        Route::get('print', 'LaporanController@print')->name('print');
    });

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});
