<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return redirect()->route('arsip.index');
});

Route::get('/arsip/{surat}/unduh', [ArsipController::class, 'unduh'])->name('arsip.unduh');
Route::resource('arsip', ArsipController::class);
Route::resource('kategori', KategoriController::class);
Route::get('/about', [PageController::class, 'about'])->name('about.index');