<?php

use App\Http\Controllers\admin\AgenController;
use App\Http\Controllers\admin\AkunController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MarketingController;
use App\Http\Controllers\admin\PelaporanController;
use App\Http\Controllers\admin\PetambakController;
use App\Http\Controllers\admin\VisitorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\pages\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', function () {
    session()->put('locale', request()->segment(2));
    return redirect()->back();
})->name('lang');

Route::middleware('guest', 'prevent.back.history')->group(function () {
    // begin:: no auth
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/agen', [HomeController::class, 'agen'])->name('agen');
    Route::get('/petambak', [HomeController::class, 'petambak'])->name('petambak');
    Route::post('/store', [HomeController::class, 'store'])->name('store');

    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/check', [AuthController::class, 'check'])->name('auth.check');
    // end:: no auth
});

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth.session', 'prevent.back.history')->prefix('admin')->as('admin.')->group(function () {
    Route::controller(DashboardController::class)->prefix('dashboard')->as('dashboard.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    // begin:: akun
    Route::controller(AkunController::class)->prefix('akun')->as('akun.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/save_picture', 'save_picture')->name('save_picture');
        Route::post('/save_account', 'save_account')->name('save_account');
        Route::post('/save_security', 'save_security')->name('save_security');
    });
    // end:: akun

    // begin:: marketing
    Route::controller(MarketingController::class)->prefix('marketing')->as('marketing.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
        Route::post('/show', 'show')->name('show');
        Route::post('/save', 'save')->name('save');
        Route::post('/del', 'del')->name('del');
    });
    // end:: marketing

    // begin:: pelaporan
    Route::controller(PelaporanController::class)->prefix('pelaporan')->as('pelaporan.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
    });
    // end:: pelaporan

    // begin:: agen
    Route::controller(AgenController::class)->prefix('agen')->as('agen.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
    });
    // end:: agen

    // begin:: petambak
    Route::controller(PetambakController::class)->prefix('petambak')->as('petambak.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
    });
    // end:: petambak

    // begin:: visitor
    Route::controller(VisitorController::class)->prefix('visitor')->as('visitor.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
    });
    // end:: visitor
});
