<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\guru\GuruController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\Siswa\SiswaController;
use App\Http\Controllers\guru\GuruLmsController;
use App\Http\Controllers\siswa\SiswaLmsController;
use App\Http\Controllers\beranda\BerandaController;
use App\Http\Controllers\guru\lms\ForumGuruController;
use App\Http\Controllers\guru\lms\TugasGuruController;
use App\Http\Controllers\guru\lms\MateriGuruController;
use App\Http\Controllers\guru\lms\NilaiKelasController;
use App\Http\Controllers\StaffAkademik\KelasController;

use App\Http\Controllers\guru\lms\AnggotaGuruController;
use App\Http\Controllers\guru\lms\AnggotaSiswaContoller;
use App\Http\Controllers\siswa\lms\ForumSiswaController;
use App\Http\Controllers\siswa\lms\TugasSiswaController;
use App\Http\Controllers\staffakademik\JadwalController;
use App\Http\Controllers\siswa\lms\MateriSiswaController;
use App\Http\Controllers\superadmin\SuperadminController;
use App\Http\Controllers\guru\lms\DashboardGuruController;
use App\Http\Controllers\pengurusekstra\AnggotaController;
use App\Http\Controllers\siswa\lms\AnggotaSiswaController;
use App\Http\Controllers\staffakademik\PrestasiController;
use App\Http\Controllers\siswa\lms\DashboardSiswaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\perpustakaan\PerpustakaanController;
use App\Http\Controllers\staffakademik\LihatJadwalController;
use App\Http\Controllers\siswa\lms\DaftarTugasSiswaController;
use App\Http\Controllers\pembinaekstra\PembinaekstraController;
use App\Http\Controllers\pengurusekstra\PerlengkapanController;
use App\Http\Controllers\staffakademik\StaffakademikController;
use App\Http\Controllers\pembinaekstra\PembinaAnggotaController;
use App\Http\Controllers\superadmin\KelolaStaffPerpusController;
use App\Http\Controllers\pembinaekstra\PenilaianEkstraController;
use App\Http\Controllers\pengurusekstra\PengurusekstraController;
use App\Http\Controllers\superadmin\KelolaStaffAkademikController;

use App\Http\Controllers\Ekstrakurikuler\EkstrakurikulerController;

use App\Http\Controllers\pengurusekstra\HistoriPeminjamanController;
use App\Http\Controllers\staffakademik\DashboardStaffAkdemikController;
use App\Http\Controllers\pembinaekstra\PerlengkapanController as PembinaekstraPerlengkapanController;
use App\Http\Controllers\pembinaekstra\HistoriPeminjamanController as PembinaekstraHistoriPeminjamanController;

use App\Http\Controllers\staffperpus\CategoryController;
use App\Http\Controllers\staffperpus\StaffperpusController;
// Route::get('/', function () {
//     return view('beranda.home');
// })->name('beranda.home');

Route::prefix('/')->group(function () {
    Route::get('/', [BerandaController::class, 'home'])->name('beranda.home');
    Route::get('/perpustakaanPublik', [BerandaController::class, 'perpustakaanPublik'])->name('beranda.perpustakaanPublik');
});
Route::get('/auth/redirect', [GoogleLoginController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/google/call-back', [GoogleLoginController::class, 'callback']);


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
// Super Admin
Route::group(['prefix' => 'superadmin', 'middleware' => ['admin']], function () {
    Route::get('/dashboard', [SuperadminController::class, 'index'])->name('superadmin.dashboard');
    //STAFF AKADEMIK//
    Route::get('/kelola-staff-akademik', [KelolaStaffAkademikController::class, 'index'])->name('superadmin.kelola_staff_akademik');
    Route::get('/kelola-staff-akademik/create', [KelolaStaffAkademikController::class, 'create'])->name('superadmin.kelola_staff_akademik.create');
    Route::post('/kelola-staff-akademik/store', [KelolaStaffAkademikController::class, 'store'])->name('superadmin.kelola_staff_akademik.store');
    Route::get('/kelola-staff-akademik/edit/{id}', [KelolaStaffAkademikController::class, 'edit'])->name('superadmin.kelola_staff_akademik.edit');
    Route::post('/kelola-staff-akademik/update', [KelolaStaffAkademikController::class, 'update'])->name('superadmin.kelola_staff_akademik.update');
    Route::delete('/superadmin/kelola_staff_akademik/delete/{id}', [KelolaStaffAkademikController::class, 'destroy'])->name('superadmin.kelola_staff_akademik.destroy');
    Route::post('/superadmin/kelola_staff_akademik/reset/{id}', [KelolaStaffAkademikController::class, 'reset'])->name('superadmin.kelola_staff_akademik.reset');
    //END STAFF AKADEMIK//
    //STAFF PERPUS//
    Route::get('/kelola-staff-perpus', [KelolaStaffPerpusController::class, 'index'])->name('superadmin.kelola_staff_perpus');
    Route::get('/kelola-staff-perpus/create', [KelolaStaffPerpusController::class, 'create'])->name('superadmin.kelola_staff_perpus.create');
    Route::post('/kelola-staff-perpus/store', [KelolaStaffPerpusController::class, 'store'])->name('superadmin.kelola_staff_perpus.store');
    Route::get('/kelola-staff-perpus/edit/{id}', [KelolaStaffPerpusController::class, 'edit'])->name('superadmin.kelola_staff_perpus.edit');
    Route::post('/kelola-staff-perpus/update', [KelolaStaffPerpusController::class, 'update'])->name('superadmin.kelola_staff_perpus.update');
    Route::delete('/superadmin/kelola_staff_perpus/delete/{id}', [KelolaStaffPerpusController::class, 'destroy'])->name('superadmin.kelola_staff_perpus.destroy');
    Route::post('/superadmin/kelola_staff_perpus/reset/{id}', [KelolaStaffPerpusController::class, 'reset'])->name('superadmin.kelola_staff_perpus.reset');
    //END STAFF PERPUS//
    Route::get('/keloladataguru', [SuperadminController::class, 'showDataGuru'])->name('superadmin.keloladataguru');
    Route::get('/keloladatasiswa', [SuperadminController::class, 'showDataSiswa'])->name('superadmin.keloladatasiswa');
    Route::get('/kelola-akun/data-guru/tambah', [SuperadminController::class, 'create'])->name('data.guru.tambah');
    Route::get('/kelola-akun/data-siswa/tambah', [SuperadminController::class, 'createSiswa'])->name('data.siswa.tambah');
    // Untuk Menambah Data
    Route::post('/kelola-akun/data-guru/store', [SuperadminController::class, 'store'])->name('guru.store');
    Route::post('/kelola-akun/data-siswa/store', [SuperadminController::class, 'storeSiswa'])->name('siswa.store');
    // Untuk Menghapus Data
    Route::delete('/kelola-akun/data-guru/{id}', [SuperadminController::class, 'destroy'])->name('guru.destroy');
    Route::delete('/kelola-akun/data-siswa/{id}', [SuperadminController::class, 'siswaDestroy'])->name('siswa.destroy');
    // Untuk Mengedit Data
    Route::get('guru/edit/{id_guru}', [SuperadminController::class, 'edit'])->name('guru.edit');
    Route::put('guru/update/{id_guru}', [SuperadminController::class, 'update'])->name('guru.update');
    // Untuk Mengedit Data
    Route::get('siswa/editsiswa/{id_siswa}', [SuperadminController::class, 'siswaEdit'])->name('siswa.edit');
    Route::put('siswa/updatesiswa/{id_siswa}', [SuperadminController::class, 'siswaUpdate'])->name('siswa.update');
    // Untuk Search Data
    Route::get('/superadmin/keloladataguru/search', [SuperadminController::class, 'searchGuru'])->name('superadmin.searchGuru');
    Route::get('/superadmin/keloladatasiswa/search', [SuperadminController::class, 'searchSiswa'])->name('superadmin.searchSiswa');
});
Route::group(['prefix' => 'staff_akademik', 'middleware' => ['staff_akademik']], function () {
    Route::get('/dashboard', [DashboardStaffAkdemikController::class, 'index'])->name('staff_akademik.dashboard');
    //EDIT PROFILE STAFF AKADEMIK
    Route::get('/profile', [StaffakademikController::class, 'profile'])->name('staff_akademik.profile');
    Route::post('/profile/update', [StaffakademikController::class, 'update'])->name('staff_akademik.profile.update');
    //END PROFILE STAFF AKADEMIK

    /**
     * START JADWAL MANAGEMENT
     */
    Route::get('/jadwal', [JadwalController::class, 'jadwalIndex'])->name('staff_akademik.jadwal');
    Route::get('/jadwal/tambah', [JadwalController::class, 'createJadwal'])->name('staff_akademik.jadwal.create');
    Route::post('/jadwal/tambah', [JadwalController::class, 'storeJadwal'])->name('staff_akademik.jadwal.store');
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'editJadwal'])->name('staff_akademik.jadwal.edit');
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'editJadwal'])->name('staff_akademik.jadwal.edit');
    Route::put('/jadwal/update/{id}', [JadwalController::class, 'updateJadwal'])->name('staff_akademik.jadwal.update');
    Route::delete('/jadwal/delete/{id}', [JadwalController::class, 'deleteJadwal'])->name('staff_akademik.jadwal.delete');
    Route::get('/jadwal/import', [JadwalController::class, 'importPage'])->name('staff_akademik.jadwal.import');
    Route::post('/jadwal/import', [JadwalController::class, 'importExcel'])->name('staff_akademik.jadwal.import');
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

    /**
     * START MATA PELAJARAN MANAGEMENT
     */
    // Menampilkan daftar mata pelajaran
    Route::get('/mata-pelajaran', [KelasController::class, 'index'])->name('staff_akademik.mata-pelajaran.index');
    // Menampilkan form untuk membuat mata pelajaran baru
    Route::get('/mata-pelajaran/create', [KelasController::class, 'create'])->name('staff_akademik.mata-pelajaran.create');
    // Menyimpan mata pelajaran baru
    Route::post('/mata-pelajaran', [KelasController::class, 'store'])->name('staff_akademik.mata-pelajaran.store');
    // Menampilkan form edit mata pelajaran berdasarkan ID
    Route::get('/mata-pelajaran/{id}/edit', [KelasController::class, 'edit'])->name('staff_akademik.mata-pelajaran.edit');
    // Memperbarui data mata pelajaran berdasarkan ID
    Route::put('/mata-pelajaran/{id}', [KelasController::class, 'update'])->name('staff_akademik.mata-pelajaran.update');
    // Menghapus mata pelajaran berdasarkan ID
    Route::delete('/mata-pelajaran/{id}', [KelasController::class, 'destroy'])->name('staff_akademik.mata-pelajaran.destroy');


    //crud kelas
    Route::get('/kelas', [KelasController::class, 'indexKelas'])->name('staff_akademik.kelas.index');
    Route::get('/kelas/create', [KelasController::class, 'createKelas'])->name('staff_akademik.kelas.create');
    Route::post('/kelas', [KelasController::class, 'storeKelas'])->name('staff_akademik.kelas.store');
    Route::get('/kelas/{id}/edit', [KelasController::class, 'editKelas'])->name('staff_akademik.kelas.edit');
    Route::put('/kelas/{id}', [KelasController::class, 'updateKelas'])->name('staff_akademik.kelas.update');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroyKelas'])->name('staff_akademik.kelas.destroy');

    Route::get('/guru-mata-pelajaran', [KelasController::class, 'indexGuruMataPelajaran'])->name('staff_akademik.guru_mata_pelajaran.index');
    Route::get('/guru-mata-pelajaran/create', [KelasController::class, 'createGuruMataPelajaran'])->name('staff_akademik.guru_mata_pelajaran.create');
    Route::post('/guru-mata-pelajaran', [KelasController::class, 'storeGuruMataPelajaran'])->name('staff_akademik.guru_mata_pelajaran.store');
    Route::get('/guru-mata-pelajaran/{id}/edit', [KelasController::class, 'editGuruMataPelajaran'])->name('staff_akademik.guru_mata_pelajaran.edit');
    Route::put('/guru-mata-pelajaran/{id}', [KelasController::class, 'updateGuruMataPelajaran'])->name('staff_akademik.guru_mata_pelajaran.update');
    Route::delete('/guru-mata-pelajaran/{id}', [KelasController::class, 'destroyGuruMataPelajaran'])->name('staff_akademik.guru_mata_pelajaran.destroy');

    Route::get('/matpel/master-guru', [KelasController::class, 'showMasterGuru'])->name('master.guru');
    Route::get('/matpel/master-kelas', [KelasController::class, 'showMasterKelas'])->name('master.kelas');
    Route::get('/matpel/master-matpel', [KelasController::class, 'showMasterMatpel'])->name('master.matpel');

    //lihat jadwal
    Route::get('/jadwal-kelas', [LihatJadwalController::class, 'kelas_index'])->name('lihat.jadwal.kelas');
    Route::get('/jadwal-guru', [LihatJadwalController::class, 'guru_index'])->name('lihat.jadwal.guru');
});
/**
 * END MATA PELAJARAN MANAGEMENT
 */

Route::get("/prestasi/pengajuan", [PrestasiController::class, "pengajuan"])->name("prestasi.pengajuan");




// P E R P U S T A K A A N

Route::group(['prefix' => 'staff_perpus', 'middleware' => ['staff_perpus']], function () {
    //INDEX
    Route::get('/dashboard', [StaffperpusController::class, 'index'])->name('staff_perpus.dashboard');

    //KATEGORI
    Route::get('/mngcategory', [CategoryController::class, 'manageCategory'])->name('staff_perpus.managecategories');
    Route::post('/abcategory', [CategoryController::class, 'addCategory'])->name('bookcategories.create');
    Route::post('/dbcategories', [CategoryController::class, 'deleteCategory'])->name('bookcategories.delete');
    // CRUD Buku
    Route::get('/buku', [StaffperpusController::class, 'daftarbuku'])->name('staff_perpus.buku.daftarbuku');
    Route::get('/buku/create', [StaffperpusController::class, 'createbuku'])->name('staff_perpus.buku.create');
    Route::post('/buku', [StaffperpusController::class, 'storebuku'])->name('staff_perpus.buku.store');
    Route::get('/buku/{id}/edit', [StaffperpusController::class, 'editbuku'])->name('staff_perpus.buku.edit');
    Route::put('/buku/{id}', [StaffperpusController::class, 'updatebuku'])->name('staff_perpus.buku.update');
    Route::delete('/buku/{id}', [StaffperpusController::class, 'destroybuku'])->name('staff_perpus.buku.destroy');
});



// Route Siswa
Route::group(['prefix' => 'siswa', 'middleware' => ['siswa']], function () {
    Route::get('/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
    /**
     * Start Pengurus Ekstrakurikuler
     */
    Route::group(['middleware' => 'pengurus'], function () {
        Route::get('/ekstrakurikuler/dashboard', [PengurusEkstraController::class, 'index'])->name('pengurus_ekstra.dashboard');

        // Route::get('siswa/ekstrakurikuler/penilaian', [PenilaianController::class, 'index'])->name('pengurus_ekstra.penilaian');

        // Anggota
        Route::get('/ekstrakurikuler/anggota', [AnggotaController::class, 'index'])->name('pengurus_ekstra.anggota');
        Route::put('/ekstrakurikuler/anggota/update-status/{id}', [AnggotaController::class, 'updateStatus'])->name('pengurus_ekstra.anggota.updateStatus');

        // Perlengkapan
        Route::get('/ekstrakurikuler/perlengkapan', [PerlengkapanController::class, 'index'])->name('pengurus_ekstra.perlengkapan');
        Route::post('/ekstrakurikuler/perlengkapan/tambah', [PerlengkapanController::class, 'store'])->name('pengurus_ekstra.perlengkapan.store');
        Route::put('/ekstrakurikuler/perlengkapan/update/{id}', [PerlengkapanController::class, 'update'])->name('pengurus_ekstra.perlengkapan.update');
        Route::delete('/ekstrakurikuler/perlengkapan/delete/{id}', [PerlengkapanController::class, 'destroy'])->name('pengurus_ekstra.perlengkapan.delete');

        // Histori Peminjaman
        Route::get('/ekstrakurikuler/perlengkapan/histori/{id}', [HistoriPeminjamanController::class, 'index'])->name('pengurus_ekstra.histori');
        Route::post('/ekstrakurikuler/perlengkapan/histori/', [HistoriPeminjamanController::class, 'store'])->name('pengurus_ekstra.histori.store');
        Route::put('/ekstrakurikuler/perlengkapan/histori/{id}', [HistoriPeminjamanController::class, 'update'])->name('pengurus_ekstra.histori.update');
        Route::delete('/ekstrakurikuler/perlengkapan/histori/{id}', [HistoriPeminjamanController::class, 'destroy'])->name('pengurus_ekstra.histori.delete');
    });
    /**
     * End Pengurus Ekstrakurikuler
     */


    /**
     * START LMS
     */
    Route::get('/dashboard/lms', [DashboardSiswaController::class, 'index'])->name('siswa.dashboard.lms');
    Route::get('/dashboard/lms/materi', [SiswaLmsController::class, 'materi'])->name('siswa.dashboard.lms.materi');
    Route::get('/dashboard/lms/tugas', [TugasSiswaController::class, 'index'])->name('siswa.dashboard.lms.tugas');
    Route::get('/dashboard/lms/forum/{id}', [ForumSiswaController::class, 'index'])->name('siswa.dashboard.lms.forum');
    Route::get('/dashboard/lms/forum/{id}/tugas', [TugasSiswaController::class, 'forumTugas'])->name('siswa.dashboard.lms.forum.tugas');
    Route::get('/dashboard/lms/forum/{id}/anggota', [AnggotaSiswaController::class, 'index'])->name('siswa.dashboard.lms.forum.anggota');
    Route::get('/dashboard/lms/materi/{id}', [MateriSiswaController::class, 'detail'])->name('siswa.dashboard.lms.detail.materi');
    Route::get('/dashboard/lms/tugas/{id}', [TugasSiswaController::class, 'detail'])->name('siswa.dashboard.lms.detail.tugas');
    Route::get('/dashboard/lms/tugas/tracking/ditugaskan/{id}', [DaftarTugasSiswaController::class, 'ditugaskan'])->name('siswa.dashboard.lms.tracking.tugas.ditugaskan');
    Route::get('/dashboard/lms/tugas/tracking/belum_diserahkan/{id}', [DaftarTugasSiswaController::class, 'ditugaskan'])->name('siswa.dashboard.lms.tracking.tugas.belum_diserahkan');
    Route::get('/dashboard/lms/tugas/tracking/diserahkan/{id}', [DaftarTugasSiswaController::class, 'ditugaskan'])->name('siswa.dashboard.lms.tracking.tugas.diserahkan');
    /**
     * END LMS
     */




    // START PERPUS

    Route::get('/dashboard/perpustakaan', [PerpustakaanController::class, 'indexSiswa'])->name('dashboard.perpustakaan');
    Route::get('/dashboard/perpustakaan/detail/{id}', [PerpustakaanController::class, 'showSiswa'])->name('siswa.dashboard.perpustakaan.detail');


    //END PERPUS
});




// GURU ROLE
Route::group(['prefix' => 'guru', 'middleware' => ['guru']], function () {
    Route::get('/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');


    /**
     * Start Pembina Ekstrakurikuler
     */
    Route::group(['middleware' => 'pembina_ekstra'], function () {
        Route::get('/pembina-dashboard', [PembinaekstraController::class, 'index'])->name('pembina.dashboard');

        // Anggota Ekstrakurikuler
        Route::get('/pembina/ekstrakurikuler/anggota', [PembinaAnggotaController::class, 'index'])->name('pembina.anggota');

        // Perlengkapan Ekstrakurikuler
        Route::get('/pembina/ekstrakurikuler/perlengkapan', [PembinaekstraPerlengkapanController::class, 'index'])->name('pembina.perlengkapan');
        Route::get('/pembina/ekstrakurikuler/perlengkapan/histori/{id}', [PembinaekstraHistoriPeminjamanController::class, 'index'])->name('pembina.histori');

        // Penilaian Ekstrakurikuler
        Route::get('/pembina/ekstrakurikuler/penilaian', [PenilaianEkstraController::class, 'index'])->name('pembina.penilaian');
        Route::post('/pembina/ekstrakurikuler/penilaian/{id}', [PenilaianEkstraController::class, 'storeOrUpdate'])->name('pembina.penilaian.storeOrUpdate');
        Route::get('/pembina/ekstrakurikuler/penilaian/{tahun_ajaran}', [PenilaianEkstraController::class, 'show'])->name('pembina.penilaian.filter');
    });
    /**
     * End Pembina Ekstrakurikuler
     */


    /**
     * START LMS
     */
    Route::get('/dashboard/lms', [DashboardGuruController::class, 'index'])->name('guru.dashboard.lms');
    Route::get('/dashboard/lms/materi', [GuruLmsController::class, 'materi'])->name('guru.dashboard.lms.materi');
    Route::get('/dashboard/lms/materi/create', [GuruLmsController::class, 'materiCreateView'])->name('guru.dashboard.lms.materi.create_view');
    Route::get('/dashboard/lms/materi/create/{id}', [GuruLmsController::class, 'materiCreate'])->name('guru.dashboard.lms.materi.create');
    Route::get('/dashboard/lms/materi/{id}', [GuruLmsController::class, 'materiDetail'])->name('guru.dashboard.lms.materi.detail');
    Route::post('/dashboard/lms/materi/{id}', [GuruLmsController::class, 'materiStore'])->name('guru.dashboard.lms.materi.store');
    Route::delete('/dashboard/lms/materi/{id}', [GuruLmsController::class, 'materiDestroy'])->name('guru.dashboard.lms.materi.destroy');
    Route::get('/dashboard/lms/materi/edit/{id}', [GuruLmsController::class, 'materiEdit'])->name('guru.dashboard.lms.materi.edit');
    Route::put('/dashboard/lms/materi/{id}', [GuruLmsController::class, 'materiUpdate'])->name('guru.dashboard.lms.materi.update');


    Route::get('/dashboard/lms/tugas', [TugasGuruController::class, 'index'])->name('guru.dashboard.lms.tugas');
    Route::get('/dashboard/lms/forum/{id}', [ForumGuruController::class, 'index'])->name('guru.dashboard.lms.forum');
    Route::get('/dashboard/lms/forum/tugas/{id}', [TugasGuruController::class, 'forumTugas'])->name('guru.dashboard.lms.forum.tugas');
    Route::get('/dashboard/lms/forum/anggota/{id}', [AnggotaGuruController::class, 'index'])->name('guru.dashboard.lms.forum.anggota');
    Route::get('/dashboard/lms/nilai_kelas/{id}', [NilaiKelasController::class, 'index'])->name('guru.dashboard.lms.forum.nilai_kelas');
    Route::get('/dashboard/lms/materi/{id}', [MateriGuruController::class, 'detail'])->name('guru.dashboard.lms.detail.materi');
    Route::get('/dashboard/lms/tugas/{id}', [TugasGuruController::class, 'detail'])->name('guru.dashboard.lms.detail.tugas');

    /**
     * END LMS
     */


    // START PERPUS

    Route::get('/dashboard/perpustakaan', [PerpustakaanController::class, 'indexGuru'])->name('perpustakaan');
    Route::get('/dashboard/perpustakaan/detail/{id}', [PerpustakaanController::class, 'showGuru'])->name('dashboard.perpustakaan.detail');


    //END PERPUS

});


Route::group(['prefix' => 'pembina_ekstra', 'middleware' => ['pembina_ekstra']], function () {
    Route::get('/pembina', [PembinaekstraController::class, 'index'])->name('pembina_ekstra.dashboard');
});





//route crud kelas



Route::group(['prefix' => 'ekstrakrikuler'], function () {

    Route::get('/', [EkstrakurikulerController::class, 'dashboardEkstra'])->name('ekstrakurikuler.dashboardEkstra');
    Route::group(['middleware' => ['siswa']], function () {

        Route::post('/registrasi-ekstrakurikuler', [EkstrakurikulerController::class, 'submitForm'])->name('ekstrakurikuler.submit');

        Route::middleware('auth:web-siswa')->group(function () {
            Route::get('/registrasi-ekstra', [YourController::class, 'showRegistrasi'])->name('ekstrakurikuler.registrasi');
        });
    });
});

Route::get('/registrasi-ekstrakurikuler', [EkstrakurikulerController::class, 'showForm'])->name('ekstrakurikuler.registrasi');
Route::post('/registrasi-ekstrakurikuler/tambah', [EkstrakurikulerController::class, 'submitForm'])->name('ekstrakurikuler.registrasi.store');
//registrasi

// Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'dashboardEkstra'])->name('ekstrakurikuler.dashboardEkstra');

// Route untuk halaman detail ekstrakurikuler
Route::get('/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'show'])->name('ekstrakurikuler.detail');


require __DIR__ . '/auth.php';
