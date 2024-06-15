<?php

use App\Http\Controllers\LingkunganController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\RukunTetanggaController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\WargaController;
use App\Models\RukunTetangga;
use App\Models\Tagihan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',  [App\Http\Controllers\HomeController::class, 'index']);
Route::post('/dashboard',  [App\Http\Controllers\HomeController::class, 'pengeluaran']);
Route::post('/dashboard/pemasukan',  [App\Http\Controllers\HomeController::class, 'pemasukan']);
Route::post('/dashboard/warga',  [App\Http\Controllers\HomeController::class, 'agama']);
Route::post('/dashboard/gender',  [App\Http\Controllers\HomeController::class, 'gender']);
Route::post('/dashboard/jumlahWarga',  [App\Http\Controllers\HomeController::class, 'warga']);

Route::get('/login', function () {
    return view('login');
});

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/dashboard/rukun-tetanggas', RukunTetanggaController::class);
Route::resource('/dashboard/wargas', WargaController::class);
Route::resource('/dashboard/lingkungans', LingkunganController::class);
Route::resource('/dashboard/pengeluarans', PengeluaranController::class);
Route::resource('/dashboard/tagihans', TagihanController::class);


Route::get('/dashboard/tagihans/approve/{id}', [TagihanController::class, 'approve']);
Route::get('/dashboard/tagihans/warga/{id}', [TagihanController::class, 'warga']);
Route::get('/dashboard/tagihan/laporan', [TagihanController::class, 'laporan']);
Route::get('/dashboard/tagihan/laporan/export', [TagihanController::class, 'export']);
Route::post('/dashboard/tagihan/warga/{id}', [TagihanController::class, 'filter']);
Route::post('/dashboard/tagihan/warga', [TagihanController::class, 'listFilter']);
Route::post('/dashboard/warga/rt', [WargaController::class, 'rtFilter']);
Route::get('/dashboard/warga/search/{query}', [WargaController::class, 'search']);
Route::get('/dashboard/warga/laporan', [WargaController::class, 'laporan']);
Route::get('/dashboard/warga/laporan/export/{rt}', [WargaController::class, 'export']);
