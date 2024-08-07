<?php

use App\Http\Controllers\LingkunganController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\RukunTetanggaController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Models\RukunTetangga;
use App\Models\Tagihan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',  [App\Http\Controllers\HomeController::class, 'index']);
    Route::post('/dashboard',  [App\Http\Controllers\HomeController::class, 'pengeluaran']);
    Route::post('/dashboard/pemasukan',  [App\Http\Controllers\HomeController::class, 'pemasukan']);
    Route::post('/dashboard/warga',  [App\Http\Controllers\HomeController::class, 'agama']);
    Route::post('/dashboard/gender',  [App\Http\Controllers\HomeController::class, 'gender']);
    Route::post('/dashboard/jumlahWarga',  [App\Http\Controllers\HomeController::class, 'warga']);


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/dashboard/rukun-tetanggas', RukunTetanggaController::class);
    Route::get('/dashboard/rukun-tetanggas/export/pdf', [RukunTetanggaController::class, 'exportPDF']);
    Route::get('/dashboard/rukun-tetanggas/export/excel', [RukunTetanggaController::class, 'exportExcel']);
    Route::resource('/dashboard/wargas', WargaController::class);
    Route::resource('/dashboard/lingkungans', LingkunganController::class);
    Route::resource('/dashboard/pengeluarans', PengeluaranController::class);
    Route::resource('/dashboard/tagihans', TagihanController::class);
    Route::resource('/dashboard/users', UserController::class);


    Route::get('/dashboard/tagihans/approve/{id}', [TagihanController::class, 'approve']);
    Route::get('/dashboard/tagihans/warga/{id}', [TagihanController::class, 'warga']);
    Route::get('/dashboard/tagihan/laporan', [TagihanController::class, 'laporan']);
    Route::get('/dashboard/tagihan/laporan/exportpdf', [TagihanController::class, 'exportPDF']);
    Route::get('/dashboard/tagihan/laporan/exportexcel', [TagihanController::class, 'exportExcel']);
    Route::post('/dashboard/tagihans/filter', [TagihanController::class, 'listFilter'])->name('tagihans.filter');

    Route::post('/dashboard/warga/rt', [WargaController::class, 'rtFilter']);
    Route::get('/dashboard/warga/search/{query}', [WargaController::class, 'search']);
    Route::get('/dashboard/warga/laporan', [WargaController::class, 'laporan']);
    Route::get('/dashboard/warga/export/pdf/{rt}', [WargaController::class, 'exportPDF'])->name('export.pdf');
    Route::get('/dashboard/warga/export/excel/{rt}', [WargaController::class, 'exportExcel'])->name('export.excel');


    Route::get('/dashboard/lingkungan/laporan', [LingkunganController::class, 'laporan']);
    Route::get('/dashboard/lingkungan/laporan/export/pdf', [LingkunganController::class, 'exportPDF']);
    Route::get('/dashboard/lingkungan/laporan/export/excel', [LingkunganController::class, 'exportExcel']);


    Route::get('/dashboard/pengeluaran/export/pdf', [PengeluaranController::class, 'exportPDF']);
    Route::get('/dashboard/pengeluaran/export/excel', [PengeluaranController::class, 'exportExcel']);
});



Route::get('/login', function () {
    return view('login');
});

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Auth::routes(['verify' => true]);
