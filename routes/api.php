<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\fotoController;
use App\Http\Controllers\api\AlbumController;
use App\Http\Controllers\api\informasiController;
use App\Http\Controllers\api\AgendaController;
use App\Http\Controllers\api\KategoriController;
use App\Http\Controllers\api\ProfileController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\HomeController;
use App\Http\Middleware\TrackVisitor;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum',)->post('/logout', [AuthController::class, 'logout']);


// Route API untuk Informasi
Route::prefix('informasi')->group(function () {

    Route::get('/tampil', [informasiController::class, 'tampil']); // Route untuk fungsi tampil
    Route::get('/', [informasiController::class, 'index']); // Route untuk fungsi index
    Route::post('/', [informasiController::class, 'store'])->middleware('auth:sanctum'); // Route untuk fungsi store
    Route::get('/{informasi}', [informasiController::class, 'show']); // Route untuk fungsi show
    Route::post('/{informasi}', [informasiController::class, 'update'])->middleware('auth:sanctum');; // Route untuk fungsi update
    Route::delete('/{informasi}', [informasiController::class, 'destroy']); // Route untuk fungsi destroy
});



Route::apiResource('kategori', KategoriController::class);


// Route API untuk Agenda
Route::prefix('agenda')->group(function () {
    Route::get('/tampil', [AgendaController::class, 'tampil']); // Route untuk fungsi tampil
    Route::get('/', [AgendaController::class, 'index']); // Route untuk fungsi index
    Route::post('/', [AgendaController::class, 'store'])->middleware('auth:sanctum'); // Route untuk fungsi store
    Route::get('/{agenda}', [AgendaController::class, 'show']); // Route untuk fungsi show
    Route::put('/{agenda}', [AgendaController::class, 'update'])->middleware('auth:sanctum'); // Route untuk fungsi update
    Route::delete('/{agenda}', [AgendaController::class, 'destroy']); // Route untuk fungsi destroy
});



Route::prefix('albums')->group(function () {
    Route::get('/', [AlbumController::class, 'index']);
    Route::get('/{id}', [AlbumController::class, 'show']);
    Route::post('/', [AlbumController::class, 'store'])->middleware('auth:sanctum');
    Route::put('/{id}', [AlbumController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/{id}', [AlbumController::class, 'destroy']);
});



Route::prefix('foto')->group(function () {
    Route::get('/tampil', [fotoController::class, 'tampil']); // Route untuk fungsi tampil
    Route::get('/', [fotoController::class, 'index']);
    Route::get('/{fotoID}', [fotoController::class, 'show']);
    Route::post('/', [fotoController::class, 'store'])->middleware('auth:sanctum');
    Route::put('/{fotoID}', [fotoController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/{fotoID}', [fotoController::class, 'destroy']);
});

// buatkan route untuk kategori
Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::get('/{kategori}', [KategoriController::class, 'show']);
    Route::post('/', [KategoriController::class, 'store'])->middleware('auth:sanctum');
    Route::put('/{kategori}', [KategoriController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/{kategori}', [KategoriController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/all-data', [HomeController::class, 'getAllData']);
