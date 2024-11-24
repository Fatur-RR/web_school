<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AlbumController;
use App\Http\Middleware\NoBackAfterLogout;
use App\Http\Middleware\TrackVisitor;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\SettingController;


// Rute untuk halaman publik
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::middleware([TrackVisitor::class])->group(function () {
    Route::get('/informasipage', [InformasiController::class, 'tampil'])->name('informasi');
    Route::get('/agendaPage', [AgendaController::class, 'tampil'])->name('agenda');
    Route::get('/gallery', [FotoController::class, 'indexA'])->name('gallery');
    Route::get('/albumPage', [AlbumController::class, 'tampil'])->name('album');
    Route::get('/album/{id}', [AlbumController::class, 'show'])->name('show');
    Route::get('/foto/{id}', [FotoController::class, 'show']);
});


// Rute untuk dashboard, dengan middleware auth dan verified
Route::middleware(['auth', 'verified', NoBackAfterLogout::class])->group(function () {
    Route::get('/dashboard', [StatisticsController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('foto', FotoController::class);
    Route::resource('informasi', InformasiController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('agenda', AgendaController::class);
    Route::resource('album', AlbumController::class);
    
});

// Menggunakan require untuk file auth
require __DIR__.'/auth.php';
