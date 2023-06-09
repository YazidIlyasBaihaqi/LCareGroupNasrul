<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DakesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\JurkesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::resource('user', UserController::class);
Route::resource('jurkes', JurkesController::class); //Jurnal Perawatan
Route::resource('dakes', DakesController::class); //Pemantauan Kesehatan
Route::resource('dokumed', DokumenController::class); //Dokumen Medis
Route::resource('artikel', ArtikelController::class);
// Route::resource('admin', ArtikelController::class);

Route::get('/home', DashboardController::class)->middleware('auth');

// Route::get('/admin', [DashboardController::class, 'admin']);
Route::get('/admin', [DashboardController::class, 'adminView']);
Route::get('/logout', [ProfileController::class, 'doLogout']);
Route::get('/', [ProfileController::class, 'show'])->name('login');
Route::post('/login', [ProfileController::class, 'login']);

Route::get('/registrasi', function () {
    return view('register.index');
});

Route::get('/team', [DashboardController::class, 'team']);
