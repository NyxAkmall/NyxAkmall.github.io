<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemilahanController;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (! auth()->check()) {
        return redirect()->route('login');
    }

    return auth()->user()->role === 'admin'
        ? redirect()->route('dashboard')
        : redirect()->route('pemilahan');
});

/*
|--------------------------------------------------------------------------
| GUEST ONLY
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'processLogin'])
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'processRegister'])
        ->name('register.process');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    /*
    |--------------------------------------------------------------------------
    | ADMIN AREA
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/monitoring', [MonitoringController::class, 'index'])
            ->name('monitoring');

        Route::get('/laporan', [LaporanController::class, 'index'])
            ->name('laporan');

        Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPdf'])
            ->name('laporan.export.pdf');
    });

    /*
    |--------------------------------------------------------------------------
    | PETUGAS AREA
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:petugas')->group(function () {

        Route::get('/pemilahan', [PemilahanController::class, 'index'])
            ->name('pemilahan');

        Route::get('/pemilahan/create', [PemilahanController::class, 'create'])
            ->name('pemilahan.create');

        Route::post('/pemilahan/store', [PemilahanController::class, 'store'])
            ->name('pemilahan.store');

        Route::get('/pemilahan/edit/{id}', [PemilahanController::class, 'edit'])
            ->name('pemilahan.edit');

        Route::put('/pemilahan/update/{id}', [PemilahanController::class, 'update'])
            ->name('pemilahan.update');

        Route::delete('/pemilahan/delete/{id}', [PemilahanController::class, 'destroy'])
            ->name('pemilahan.delete');
    });
});

/*
|--------------------------------------------------------------------------
| FALLBACK 404
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
