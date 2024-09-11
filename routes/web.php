<?php

use App\Http\Controllers\admin\AgamaController;
use App\Http\Controllers\admin\AkunController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FasilitasController;
use App\Http\Controllers\admin\GaleriController;
use App\Http\Controllers\admin\GuruController;
use App\Http\Controllers\admin\InformasiController;
use App\Http\Controllers\admin\JabatanController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\MatpelController;
use App\Http\Controllers\admin\MedsosController;
use App\Http\Controllers\admin\OrganisasiController;
use App\Http\Controllers\admin\PendidikanController;
use App\Http\Controllers\admin\PengaturanController;
use App\Http\Controllers\admin\PrestasiController;
use App\Http\Controllers\admin\ProfilController;
use App\Http\Controllers\admin\StaffController;
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
    
        // begin:: pengaturan
        Route::controller(PengaturanController::class)->prefix('pengaturan')->as('pengaturan.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/save', 'save')->name('save');
        });
        // end:: pengaturan

        // begin:: agama
        Route::controller(AgamaController::class)->prefix('agama')->as('agama.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: agama

        // begin:: matpel
        Route::controller(MatpelController::class)->prefix('matpel')->as('matpel.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: matpel

        // begin:: jabatan
        Route::controller(JabatanController::class)->prefix('jabatan')->as('jabatan.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: jabatan

        // begin:: pendidikan
        Route::controller(PendidikanController::class)->prefix('pendidikan')->as('pendidikan.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: pendidikan

        // begin:: kategori
        Route::controller(KategoriController::class)->prefix('kategori')->as('kategori.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: kategori

        // begin:: medsos
        Route::controller(MedsosController::class)->prefix('medsos')->as('medsos.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: medsos

        // begin:: fasilitas
        Route::controller(FasilitasController::class)->prefix('fasilitas')->as('fasilitas.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
            Route::post('/status', 'status')->name('status');
        });
        // end:: fasilitas

        // begin:: organisasi
        Route::controller(OrganisasiController::class)->prefix('organisasi')->as('organisasi.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
            Route::post('/status', 'status')->name('status');
        });
        // end:: organisasi

        // begin:: prestasi
        Route::controller(PrestasiController::class)->prefix('prestasi')->as('prestasi.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
            Route::post('/status', 'status')->name('status');
        });
        // end:: prestasi

        // begin:: galeri
        Route::controller(GaleriController::class)->prefix('galeri')->as('galeri.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
            Route::post('/status', 'status')->name('status');
        });
        // end:: galeri

        // begin:: informasi
        Route::controller(InformasiController::class)->prefix('informasi')->as('informasi.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
            Route::post('/status', 'status')->name('status');
        });
        // end:: informasi

        // begin:: guru
        Route::controller(GuruController::class)->prefix('guru')->as('guru.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: guru

        // begin:: staff
        Route::controller(StaffController::class)->prefix('staff')->as('staff.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: staff

        // begin:: profil
        Route::controller(ProfilController::class)->prefix('profil')->as('profil.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: profil

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
    Route::get('/organisasi', [PagesOrganisasiController::class, 'index'])->name('organisasi');
    Route::get('/fasilitas', [PagesFasilitasController::class, 'index'])->name('fasilitas');
    Route::get('/prestasi', [PagesPrestasiController::class, 'index'])->name('prestasi');

    Route::controller(PagesGaleriController::class)->prefix('galeri')->group(function () {
        Route::get('/foto', 'foto')->name('foto');
        Route::get('/video', 'video')->name('video');
    });

    Route::controller(PagesGuruController::class)->prefix('guru')->group(function () {
        Route::get('/', 'index')->name('guru');
        Route::get('/detail/{id}', 'detail')->name('guru.detail');
    });

    Route::controller(PagesStaffController::class)->prefix('staff')->group(function () {
        Route::get('/', 'index')->name('staff');
        Route::get('/detail/{id}', 'detail')->name('staff.detail');
    });

    Route::controller(PagesProfilController::class)->prefix('profil')->group(function () {
        Route::get('/{slug}', 'index')->name('profil');
        Route::get('/{slug}/detail/{id}', 'detail')->name('profil.detail');
    });

    Route::controller(PagesInformasiController::class)->prefix('informasi')->group(function () {
        Route::get('/{slug}', 'index')->name('informasi');
        Route::get('/{slug}/detail/{id}', 'detail')->name('informasi.detail');
    });
    // end:: no auth
});
