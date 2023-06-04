<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DakesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurkesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::resource('jurkes', JurkesController::class); //Jurnal Perawatan
Route::resource('dakes', DakesController::class); //Pemantauan Kesehatan
Route::resource('home', ArtikelController::class);

Route::get('/home', DashboardController::class)->middleware('auth');

Route::get('/logout', [ProfileController::class, 'doLogout']);
Route::get('/', [ProfileController::class, 'show'])->name('login');
Route::post('/login', [ProfileController::class, 'login']);

Route::get('/registrasi', function () {
    return view('register.index');
});
