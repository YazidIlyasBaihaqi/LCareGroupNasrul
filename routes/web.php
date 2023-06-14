<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DakesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurkesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('user', UserController::class);
Route::resource('jadwal', JadwalController::class); //Jadwal
Route::get('/jadwal-pdf', [JadwalController::class, 'jadwalPDF']);
Route::get('/jadwal-excel', [JadwalController::class, 'jadwalExcel']);
Route::resource('jurkes', JurkesController::class); //Jurnal Perawatan
Route::resource('dakes', DakesController::class); //Pemantauan Kesehatan
Route::resource('dokumed', DokumenController::class); //Dokumen Medis
Route::resource('artikel', ArtikelController::class);
// Route::resource('admin', ArtikelController::class);

Route::get('/home', DashboardController::class)->middleware('auth');

Route::get('/admin', [DashboardController::class, 'adminView']);
Route::get('/logout', [ProfileController::class, 'doLogout']);
Route::get('/', [ProfileController::class, 'show'])->name('login');
Route::post('/login', [ProfileController::class, 'login']);

Route::get('/registrasi', function () {
    return view('register.index');
});

Route::get('/team', [DashboardController::class, 'team']);

// Auth::routes();

// Route::get('/home', DashboardController::class)->name('home');
