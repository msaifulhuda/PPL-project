<?php

use App\Http\Controllers\guru\GuruController;
use App\Http\Controllers\pembinaekstra\PembinaekstraController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\SiswaController;
use App\Http\Controllers\staffakademik\StaffakademikController;
use App\Http\Controllers\staffperpus\StaffperpusController;
use App\Http\Controllers\superadmin\SuperadminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group(['prefix' => 'superadmin'], function () {
    Route::get('/dashboard', [SuperadminController::class, 'index'])->name('superadmin.dashboard');
});
Route::group(['prefix' => 'staff_akademik'], function () {
    Route::get('/dashboard', [StaffakademikController::class, 'index'])->name('staff_akademik.dashboard');
});
Route::group(['prefix' => 'staff_perpus'], function () {
    Route::get('/dashboard', [StaffperpusController::class, 'index'])->name('staff_perpus.dashboard');
});
Route::group(['prefix' => 'siswa'], function () {
    Route::get('/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
});
Route::group(['prefix' => 'guru'], function () {
    Route::get('/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
});
Route::group(['prefix' => 'pembina_ekstra'], function () {
    Route::get('/dashboard', [PembinaekstraController::class, 'index'])->name('pembina_ekstra.dashboard');
});


require __DIR__.'/auth.php';
