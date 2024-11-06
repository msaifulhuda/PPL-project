<?php

use App\Models\PengurusEkstra;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\guru\GuruController;
use App\Http\Controllers\Siswa\SiswaController;
use App\Http\Controllers\guru\GuruLmsController;
use App\Http\Controllers\siswa\SiswaLmsController;
use App\Http\Controllers\superadmin\SuperadminController;
use App\Http\Controllers\staffakademik\PrestasiController;
use App\Http\Controllers\staffperpus\StaffperpusController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\perpustakaan\PerpustakaanController;
use App\Http\Controllers\pembinaekstra\PembinaekstraController;

use App\Http\Controllers\staffakademik\StaffakademikController;
use App\Http\Controllers\pengurusekstra\PengurusekstraController;
use App\Http\Controllers\staffakademik\DashboardStaffAkdemikController;

Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::group(['prefix' => 'superadmin', 'middleware' => ['admin']], function () {
    Route::get('/dashboard', [SuperadminController::class, 'index'])->name('superadmin.dashboard');
});
Route::group(['prefix' => 'staff_akademik', 'middleware' => ['staff_akademik']], function () {
    Route::get('/dashboard', [DashboardStaffAkdemikController::class, 'index'])->name('staff_akademik.dashboard');

    /**
     * START JADWAL MANAGEMENT
     */
    Route::get('/jadwal', [StaffakademikController::class, 'jadwalIndex'])->name('staff_akademik.jadwal');
    Route::get('/jadwal/tambah', [StaffakademikController::class, 'createJadwal'])->name('staff_akademik.jadwal.create');
    Route::post('/jadwal/tambah', [StaffakademikController::class, 'storeJadwal'])->name('staff_akademik.jadwal.store');
    Route::get('/jadwal/edit/{id}', [StaffakademikController::class, 'editJadwal'])->name('staff_akademik.jadwal.edit');
    Route::put('/jadwal/update/{id}', [StaffakademikController::class, 'updateJadwal'])->name('staff_akademik.jadwal.update');
    Route::delete('/jadwal/delete/{id}', [StaffakademikController::class, 'deleteJadwal'])->name('staff_akademik.jadwal.delete');
    /**
     * END JADWAL MANAGEMENT
     */

     Route::get('/kelas', [StaffakademikController::class, 'index'])->name('staffakademik.kelas.index');
     Route::post('/kelas/store', [StaffakademikController::class, 'store'])->name('staffakademik.kelas.store');
     Route::post('/kelas/update/{id}', [StaffakademikController::class, 'update'])->name('staffakademik.kelas.update');
     Route::delete('/kelas/delete/{id}', [StaffakademikController::class, 'destroy'])->name('staffakademik.kelas.delete');
     Route::get('/staff-akademik/kelas', [StaffakademikController::class, 'cari'])->name('staffakademik.kelas.index');

   /**
     * START PRESTASI
     */
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
    Route::get("/prestasi/create", [PrestasiController::class, "create"])->name("prestasi.create");
    Route::post("/prestasi/store", [PrestasiController::class, "store"])->name("prestasi.store");
    Route::get("/prestasi/pengajuan", [PrestasiController::class, "pengajuan"])->name("prestasi.pengajuan");
    /**
     * END PRESTASI
     */
});
Route::group(['prefix' => 'staff_perpus', 'middleware' => ['staff_perpus']], function () {
    Route::get('/dashboard', [StaffperpusController::class, 'index'])->name('staff_perpus.dashboard');
});


Route::group(['prefix' => 'siswa', 'middleware' => ['siswa']], function () {
    Route::get('/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');


    /**
     * Start Pengurus Ekstrakurikuler
     */
    Route::group(['middleware' => 'pengurus'], function () {
        Route::get('/ekstrakurikuler/dashboard', [PengurusEkstraController::class, 'index'])->name('pengurus_ekstra.dashboard');
        // Route::get('siswa/ekstrakurikuler/penilaian', [PenilaianController::class, 'index'])->name('pengurus_ekstra.penilaian');
        Route::get('/ekstrakurikuler/anggota', [AnggotaController::class, 'index'])->name('pengurus_ekstra.anggota');

        Route::get('/ekstrakurikuler/perlengkapan', [PerlengkapanController::class, 'index'])->name('pengurus_ekstra.perlengkapan');
        Route::post('/ekstrakurikuler/perlengkapan/tambah', [PerlengkapanController::class, 'store'])->name('pengurus_ekstra.perlengkapan.store');
        Route::put('/ekstrakurikuler/perlengkapan/update/{id}', [PerlengkapanController::class, 'update'])->name('pengurus_ekstra.perlengkapan.update');
        Route::delete('/ekstrakurikuler/perlengkapan/delete/{id}', [PerlengkapanController::class, 'destroy'])->name('pengurus_ekstra.perlengkapan.delete');

        Route::get('/ekstrakurikuler/perlengkapan/histori/{id}', [HistoriPeminjaman::class, 'index'])->name('pengurus_ekstra.histori');
    });
    /**
     * End Pengurus Ekstrakurikuler
     */

    /**
     * START LMS
     */
    Route::get('/dashboard/lms', [SiswaLmsController::class, 'index'])->name('siswa.dashboard.lms');
    Route::get('/dashboard/lms/materi', [SiswaLmsController::class, 'materi'])->name('siswa.dashboard.lms.materi');
    Route::get('/dashboard/lms/tugas', [SiswaLmsController::class, 'tugas'])->name('siswa.dashboard.lms.tugas');
    /**
     * END LMS
     */
    // START PERPUS
    Route::get('/dashboard/perpustakaan', [PerpustakaanController::class, 'index'])->name('siswa.dashboard.perpustakaan');
    //END PERPUS
});

//PERPUSTAKAAN
// Route::group(['prefix' => 'siswa', 'middleware' => ['siswa']], function () {
//     Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('perpustakaan');
// });

// GURU ROLE
Route::group(['prefix' => 'guru', 'middleware' => ['guru']], function () {
    Route::get('/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');

    Route::group(['middleware' => 'pembina_ekstra'], function () {
        Route::get('/pembina-dashboard', [PembinaekstraController::class, 'index'])->name('guru.pembina.dashboard');
    });

    /**
     * START LMS
     */
    Route::get('/dashboard/lms', [GuruLmsController::class, 'index'])->name('guru.dashboard.lms');
    Route::get('/dashboard/lms/materi', [GuruLmsController::class, 'materi'])->name('guru.dashboard.lms.materi');
    Route::get('/dashboard/lms/tugas', [GuruLmsController::class, 'tugas'])->name('guru.dashboard.lms.tugas');
    /**
     * END LMS
     */
});


Route::group(['prefix' => 'pembina_ekstra', 'middleware' => ['pembina_ekstra']], function () {
    Route::get('/dashboard', [PembinaekstraController::class, 'index'])->name('pembina_ekstra.dashboard');
});

// router akses sidebar
Route::get('/staff_akademik/master-matpel', function () {
    return view('staff_akademik.master_matpel');
})->name('master_matpel');

Route::get('/staff_akademik/master-guru', function () {
    return view('staff_akademik.master_guru');
})->name('master_guru');

Route::get('/staff_akademik/master-kelas', function () {
    return view('staff_akademik.master_kelas');
})->name('master_kelas');

//route crud kelas






Route::get('/registrasi-ekstrakurikuler', [EkstrakurikulerController::class, 'showForm'])->name('ekstrakurikuler.registrasi');
Route::post('/registrasi-ekstrakurikuler', [EkstrakurikulerController::class, 'submitForm'])->name('ekstrakurikuler.submit');

require __DIR__.'/auth.php';
