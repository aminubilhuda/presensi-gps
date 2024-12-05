<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PresensiController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:karyawan'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/proseslogin', [AuthController::class,'prosesLogin'])->name('prosesLogin');
});


Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('presensiDashboard');
    Route::get('/proseslogout', [AuthController::class,'prosesLogout'])->name('prosesLogout');

    // presensi
    Route::get('/presensi/create', [PresensiController::class,'create'])->name('presensiCreate');
    Route::post('/presensi/store', [PresensiController::class,'store'])->name('presensiStore');
});