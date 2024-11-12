<?php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\hari;
use App\Models\User;
use App\Models\kelas;
use App\Models\Siswa;
use App\Models\KelasSiswa;
use App\Models\Superadmin;
use App\Models\Staffperpus;
use Illuminate\Support\Str;
use App\Models\tahun_ajaran;
use App\Models\Staffakademik;
use App\Models\mata_pelajaran;
use Illuminate\Database\Seeder;
use App\Models\guru_mata_pelajaran;
use Database\Seeders\PerpustakaanSeeder;
use Database\Seeders\EkstrakurikulerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // isi data siswa jika belum ada
        if (Siswa::count() == 0) {
            $this->call([
                SiswaSeeder::class,
            ]);
        }

        // isi data guru jika belum ada
        if (Guru::count() == 0) {
            $this->call([
                GuruSeeder::class,
            ]);
        }

        // isi tahun ajaran jika belum ada
        if (tahun_ajaran::count() == 0) {
            $this->call([
                TahunAjaranSeeder::class,
            ]);
        }

        // isi kelas jika belum ada
        if (kelas::count() == 0) {
            $this->call([
                KelasSeeder::class,
            ]);
        }
        // isi matapelajaran jika belum ada
        if (mata_pelajaran::count() == 0) {
            $this->call([
                MataPelajaranSeeder::class,
            ]);
        }

        // isi guru matapelajran jika belum ada
        if (guru_mata_pelajaran::count() == 0) {
            $this->call([
                GuruMataPelajaranSeeder::class,
            ]);
        }

        // isi kelas siswa jika belum ada
        if (KelasSiswa::count() == 0) {
            $this->call([
                KelasSiswaSeeder::class,
            ]);
        }

        // isi hari jika belum ada
        if (hari::count() == 0) {
            $this->call([
                HariSeeder::class,
            ]);
        }

        // isi staff akademik jika belum ada
        // if (Staffakademik::count() == 0) {
        //     $this->call([
        //         StaffAkademikSeeder::class,
        //     ]);
        // }

        // isi Ekskul jika belum ada
        if (Ekstrakurikuler::count() == 0) {
            $this->call([
                EkstrakurikulerSeeder::class,
            ]);
        }

        $idUser1 = Str::uuid();
        Superadmin::create([
            'id_admin' => $idUser1,
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'email'=> 'andreeka852@gmail.com',
        ]);
        $idUser2 = Str::uuid();
        Staffperpus::create([
            'id_staff_perpustakaan' => $idUser2,
            'username' => '123456789101',
            'password' => bcrypt('Perpus123'),
        ]);
        
        $idUser3 = Str::uuid();
        Staffakademik::create([
            'id_staff_akademik' => $idUser3,
            'username' => 'akademik',
            'password' => bcrypt('Akademik123'),
        ]);

        // $this->call([
        //     KelasMapelGuruJadwalAjaranSeeder::class,
        // ]);
    }
}
