<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Admin Controllers
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\UserController;

// Guru & Siswa Controllers
use App\Http\Controllers\Guru\NilaiController as GuruNilaiController;
use App\Http\Controllers\Siswa\NilaiController as SiswaNilaiController;
use App\Http\Controllers\Guru\GuruLoginController;
use App\Http\Controllers\Siswa\SiswaLoginController;
use App\Http\Controllers\Siswa\RaporController;
use Barryvdh\DomPDF\Facade\Pdf;


/*
|--------------------------------------------------------------------------
| Root: Arahkan berdasarkan role yang sedang login
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (Auth::guard('admin')->check()) {
        return redirect()->route('admin.dashboard');
    } elseif (Auth::guard('guru')->check()) {
        return redirect()->route('guru.dashboard');
    } elseif (Auth::guard('siswa')->check()) {
        return redirect()->route('siswa.dashboard');
    }
    return redirect()->route('pilih-login');
})->name('root');

/*
|--------------------------------------------------------------------------
| Global Logout
|--------------------------------------------------------------------------
*/
Route::post('/logout', function (Request $request) {
    Auth::guard('admin')->logout();
    Auth::guard('guru')->logout();
    Auth::guard('siswa')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('pilih-login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Pilih Login (View pilih role)
|--------------------------------------------------------------------------
*/
Route::get('/pilih-login', fn () => view('auth.pilih-login'))->name('pilih-login');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
        Route::resource('/siswa', SiswaController::class);
        Route::resource('/guru', GuruController::class);
        Route::resource('/kelas', KelasController::class)->parameters(['kelas' => 'kelas']);
        Route::resource('/mapel', MapelController::class);
        Route::resource('/user', UserController::class);
        Route::get('/rapor', [RaporController::class, 'index'])->name('admin.rapor.index');
        Route::get('/rapor/{id}', [RaporController::class, 'show'])->name('admin.rapor.show');
    });
});

/*
|--------------------------------------------------------------------------
| Guru Routes
|--------------------------------------------------------------------------
*/
Route::prefix('guru')->name('guru.')->group(function () {
    Route::get('/login', [GuruLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [GuruLoginController::class, 'login'])->name('login.submit');

    Route::middleware('auth:guru')->group(function () {
        Route::get('/dashboard', fn () => view('guru.dashboard'))->name('dashboard');
        Route::resource('nilai', GuruNilaiController::class);
        Route::resource('siswa', \App\Http\Controllers\Guru\SiswaController::class);
    });
});

/*
|--------------------------------------------------------------------------
| Siswa Routes
|--------------------------------------------------------------------------
*/
Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/login', [SiswaLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [SiswaLoginController::class, 'login'])->name('login.submit');

    Route::middleware('auth:siswa')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Siswa\DashboardSiswaController::class, 'index'])->name('dashboard');
        Route::get('/nilai', [SiswaNilaiController::class, 'index'])->name('nilai');
        Route::get('/rapor', [RaporController::class, 'index'])->name('rapor');
        Route::get('/rapor/cetak', [RaporController::class, 'cetak'])->name('rapor.cetak'); 
    });
});

/*
|--------------------------------------------------------------------------
| Fallback untuk Route Login Default Laravel
|--------------------------------------------------------------------------
| Solusi error: Route [login] not defined
*/

