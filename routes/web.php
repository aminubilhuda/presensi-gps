<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PresensiController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:karyawan'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/proseslogin', [AuthController::class,'prosesLogin'])->name('proseslogin');
});


Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('presensiDashboard');
    Route::get('/proseslogout', [AuthController::class,'prosesLogout'])->name('prosesLogout');

    // presensi
    Route::get('/presensi/create', [PresensiController::class,'create'])->name('presensiCreate');
    Route::post('/presensi/store', [PresensiController::class,'store'])->name('presensiStore');

    // edit profile
    Route::get('/editprofile', [PresensiController::class,'editProfile'])->name('presensiEditProfile');
    Route::post('/presensi/{id}/updateprofile', [PresensiController::class,'updateProfile'])->name('presensiUpdateProfile');

    // history
    Route::get('/history', [PresensiController::class,'history'])->name('presensiHistory');
    
    // setting
    Route::get('/setting', [PresensiController::class,'setting'])->name('presensiSetting');
});