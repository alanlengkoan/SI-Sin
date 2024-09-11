<?php

use App\Http\Controllers\admin\AgamaController;
use App\Http\Controllers\admin\AkunController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MarketingController;
use App\Http\Controllers\admin\VisitorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\pages\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', function () {
    session()->put('locale', request()->segment(2));
    return redirect()->back();
})->name('lang');

Route::domain('admin.' . env('APP_URL'))->group(function () {
    Route::middleware('guest', 'prevent.back.history')->group(function () {
        // begin:: no auth
        Route::get('/', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/check', [AuthController::class, 'check'])->name('auth.check');
        // end:: no auth
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware('auth.session', 'prevent.back.history')->group(function () {
        Route::controller(DashboardController::class)->prefix('dashboard')->as('dashboard.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
            // Route::get('/count_visitors_day', [DashboardController::class, 'count_visitors_day'])->name('count_visitors_day');
            // Route::get('/count_visitors_mon', [DashboardController::class, 'count_visitors_mon'])->name('count_visitors_mon');
            // Route::get('/count_visitors_loc', [DashboardController::class, 'count_visitors_loc'])->name('count_visitors_loc');
        });

        // begin:: akun
        Route::controller(AkunController::class)->prefix('akun')->as('akun.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/save_picture', 'save_picture')->name('save_picture');
            Route::post('/save_account', 'save_account')->name('save_account');
            Route::post('/save_security', 'save_security')->name('save_security');
        });
        // end:: akun

        // begin:: agama
        Route::controller(AgamaController::class)->prefix('agama')->as('agama.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: agama

        // begin:: marketing
        Route::controller(MarketingController::class)->prefix('marketing')->as('marketing.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: marketing

        // begin:: visitor
        Route::controller(VisitorController::class)->prefix('visitor')->as('visitor.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
        });
        // end:: visitor
    });
});

Route::middleware('guest', 'visitor', 'set.locale')->group(function () {
    // begin:: no auth
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/agen', [HomeController::class, 'agen'])->name('agen');
    Route::get('/petambak', [HomeController::class, 'petambak'])->name('petambak');
    Route::get('/store', [HomeController::class, 'store'])->name('store');
    // end:: no auth
});
