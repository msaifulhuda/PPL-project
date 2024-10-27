<?php

use App\Http\Controllers\guru\gurucontroller;
use App\Http\Controllers\pembina_ekstra\pembinaekstracontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\siswa\siswacontroller;
use App\Http\Controllers\staff_akademik\staffakademikcontroller;
use App\Http\Controllers\staff_perpus\staffperpuscontroller;

use App\Http\Controllers\superadmin\superadmincontroller;
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
    Route::get('/dashboard', [superadmincontroller::class, 'index'])->name('superadmin.dashboard');
});
Route::group(['prefix' => 'staff_akademik'], function () {
    Route::get('/dashboard', [staffakademikcontroller::class, 'index'])->name('staff_akademik.dashboard');
});
Route::group(['prefix' => 'staff_perpus'], function () {
    Route::get('/dashboard', [staffperpuscontroller::class, 'index'])->name('staff_perpus.dashboard');
});
Route::group(['prefix' => 'siswa'], function () {
    Route::get('/dashboard', [siswacontroller::class, 'index'])->name('siswa.dashboard');
});
Route::group(['prefix' => 'guru'], function () {
    Route::get('/dashboard', [gurucontroller::class, 'index'])->name('guru.dashboard');
});
Route::group(['prefix' => 'pembina_ekstra'], function () {
    Route::get('/dashboard', [pembinaekstracontroller::class, 'index'])->name('pembina_ekstra.dashboard');
});


require __DIR__.'/auth.php';
