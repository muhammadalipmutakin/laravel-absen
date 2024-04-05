<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes([

    'register' => false
]);

Route::middleware('auth')->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index']);
    Route::get('/report', [App\Http\Controllers\ReportController::class, 'index']);
    Route::post('/report/filter', [App\Http\Controllers\ReportController::class, 'filter']);


    Route::resource('users', UserController::class);

    Route::resource('absensi', AbsensiController::class);

    // Logout route using POST method
    Route::post('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
});
