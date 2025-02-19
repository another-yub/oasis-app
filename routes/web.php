<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PemilihanController;

//route home
Route::get('/', [HomeController::class, 'index'])->name('home.index');

//route user
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

//route siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('/siswa/update', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');

//route kandidat
Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
Route::get('/kandidat/create', [KandidatController::class, 'create'])->name('kandidat.create');
Route::post('/kandidat/store', [KandidatController::class, 'store'])->name('kandidat.store');
Route::get('/kandidat/edit/{id}', [KandidatController::class, 'edit'])->name('kandidat.edit');
Route::post('/kandidat/update', [KandidatController::class, 'update'])->name('kandidat.update');
Route::get('/kandidat/delete/{id}', [KandidatController::class, 'delete'])->name('kandidat.delete');

//route pemilihan
Route::get('/pemilihan', [PemilihanController::class, 'index'])->name('pemilihan.index');
Route::get('/pemilihan/edit/{id}', [PemilihanController::class, 'edit'])->name('pemilihan.edit');
Route::post('/pemilihan/update', [PemilihanController::class, 'update'])->name('pemilihan.update');
