<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GoogleController;
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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('mahasiswa');

Route::post('/mahasiswa', [MahasiswaController::class, 'create'])->name('add.mhs');

Route::get('/mahasiswa/{id}/edit',[MahasiswaController::class,'edit']);

Route::post('/mahasiswa/{id}/update',[MahasiswaController::class, 'update']);

Route::get('/mahasiswa/delete/{id}',[MahasiswaController::class,'delete']);

Route::get('/mahasiswa/exportpdf',[MahasiswaController::class, 'exportPdf']);

Route::get('/pegawai', [App\Http\Controllers\PegawaiController2::class, 'index']);

Route::get('auth/google', [GoogleController::class,'redirectToGoogle']);

Route::get('auth/google/callback', [GoogleController::class,'handleGoogleCallback']);