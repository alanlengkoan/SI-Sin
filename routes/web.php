<?php

use App\Http\Controllers\admin\AgamaController;
use App\Http\Controllers\admin\AkunController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\VisitorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\pages\FasilitasController as PagesFasilitasController;
use App\Http\Controllers\pages\GaleriController as PagesGaleriController;
use App\Http\Controllers\pages\GuruController as PagesGuruController;
use App\Http\Controllers\pages\HomeController;
use App\Http\Controllers\pages\InformasiController as PagesInformasiController;
use App\Http\Controllers\pages\OrganisasiController as PagesOrganisasiController;
use App\Http\Controllers\pages\PrestasiController as PagesPrestasiController;
use App\Http\Controllers\pages\ProfilController as PagesProfilController;
use App\Http\Controllers\pages\StaffController as PagesStaffController;
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
            Route::get('/count_visitors_day', [DashboardController::class, 'count_visitors_day'])->name('count_visitors_day');
            Route::get('/count_visitors_mon', [DashboardController::class, 'count_visitors_mon'])->name('count_visitors_mon');
            Route::get('/count_visitors_loc', [DashboardController::class, 'count_visitors_loc'])->name('count_visitors_loc');
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
    Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
    Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
    // end:: no auth
});
