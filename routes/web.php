<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\DashboardController;

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login', function () {
    return redirect('/');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('page.home');

Route::get('/keuangan', [KeuanganController::class, 'index'])->name('page.keuangan')->middleware('auth');
Route::get('/alumni', [AlumniController::class, 'index'])->name('page.alumni')->middleware('auth');
Route::get('/profil', [ProfilController::class, 'index'])->name('page.profil')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('page.home')->middleware('auth');

Route::get('/alumni/{id}', [AlumniController::class, 'show'])->name('show.alumni')->middleware('auth');