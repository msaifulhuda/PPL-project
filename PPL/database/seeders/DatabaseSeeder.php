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
use App\Models\PengurusEkstra;
use Illuminate\Database\Seeder;
use App\Models\guru_mata_pelajaran;
use App\Models\kelas_mata_pelajaran;
use App\Models\materi;
use Database\Seeders\PerpustakaanSeeder;
use App\Models\RegistrasiEkstrakurikuler;
use App\Models\topik;
use App\Models\tugas;
use Database\Seeders\KelasMataPelajaranSeeder;

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
        if (Staffakademik::count() == 0) {
            $this->call([
                StaffAkademikSeeder::class,
            ]);
        }

        // isi Ekskul jika belum ada
        // if (Ekstrakurikuler::count() == 0) {
        //     $this->call([
        //         EkstrakurikulerSeeder::class,
        //     ]);
        // }

        // isi kelas mata pelajaran jika belum ada
        if (kelas_mata_pelajaran::count() == 0) {
            $this->call([
                KelasMataPelajaranSeeder::class,
            ]);
        }

        // isi topik, materi dan tugas jika belum ada
        if (topik::count() == 0 && materi::count() == 0 && tugas::count() == 0) {
            $this->call([
                TopikTugasMateriSeeder::class,
            ]);
        }

        // $this->call([
        //     EkstrakurikulerPengurusSeeder::class,
        // ]);

        $idUser1 = Str::uuid();
        Superadmin::create([
            'id_admin' => $idUser1,
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'email' => 'andreeka852@gmail.com',
        ]);
        $idUser2 = Str::uuid();
        Superadmin::create([
            'id_admin' => $idUser2,
            'username' => 'Superadmin',
            'password' => bcrypt('admin123'),
            'email' => 'adisahrul383@gmail.com',
        ]);
        $idStaffPerpus = Str::uuid();
        Staffperpus::create([
            'id_staff_perpustakaan' => $idStaffPerpus,
            'username' => '123456789101',
            'password' => bcrypt('Perpus123'),
        ]);
        $this->call([
            PerpustakaanSeeder::class,
        ]);

        // $idUser3 = Str::uuid();
        // Staffakademik::create([
        //     'id_staff_akademik' => $idUser3,
        //     'username' => '123456789999',
        //     'password' => bcrypt('Akademik123'),
        // ]);
        // Generate UUIDs
        // Create siswa with role 'siswa'
        $idUser4 = Str::uuid();
        $idUser9 = Str::uuid();
        $idUser10 = Str::uuid();
        $idUser11 = Str::uuid();
        $idUser12 = Str::uuid();

        // Create siswa with role 'pengurus'
        // $idUser5 = Str::uuid();
        // $idUser6 = Str::uuid();
        // $idUser7 = Str::uuid();
        // $idUser8 = Str::uuid();

        session(key: ['siswa2' => $idUser4, 'siswa3' => $idUser9, 'siswa4' => $idUser10, 'siswa5' => $idUser11]);

        // Create siswa with role 'siswa'
        // Siswa::create([
        //     'id_siswa' => $idUser4,
        //     'username' => 'siswa',
        //     'password' => bcrypt('siswa'),
        //     'role_siswa' => 'siswa',
        // ]);
        // Siswa::create([
        //     'id_siswa' => $idUser9,
        //     'username' => 'siswa2',
        //     'password' => bcrypt('siswa2'),
        //     'role_siswa' => 'siswa',
        // ]);
        // Siswa::create([
        //     'id_siswa' => $idUser10,
        //     'username' => 'siswa3',
        //     'password' => bcrypt('siswa3'),
        //     'role_siswa' => 'siswa',
        // ]);
        // Siswa::create([
        //     'id_siswa' => $idUser11,
        //     'username' => 'siswa4',
        //     'password' => bcrypt('siswa4'),
        //     'role_siswa' => 'siswa',
        // ]);
        // Siswa::create([
        //     'id_siswa' => $idUser12,
        //     'username' => 'siswa12',
        //     'password' => bcrypt('siswa12'),
        //     'role_siswa' => 'siswa',
        // ]);



        // $idUser3 = Str::uuid();
        // Staffakademik::create([
        //     'id_staff_akademik' => $idUser3,
        //     'username' => 'akademik',
        //     'password' => bcrypt('Akademik123'),
        // ]);


        // $this->call([
        //     KelasMapelGuruJadwalAjaranSeeder::class,
        // ]);


        // $this->call([
        //     KelasMapelGuruJadwalAjaranSeeder::class,
        // ]);
        // $this->call([
        //     EkstrakurikulerPengurusSeeder::class,
        // ]);        
        $this->call([
            KelasMapelGuruJadwalAjaranSeeder::class,
        ]);
        // $this->call([
        //     EkstrakurikulerPengurusSeeder::class,
        // ]);

        // $this->call([
        //     MateriTugasSeeder::class,
        // ]);

        // Registrasi Ekstrakurikuler
        // $id_pengurus = [session('id_pengurus1'), session('id_pengurus2'), session('id_pengurus3'), session('id_pengurus4')];
        // $id_ekstra = [session('id_ekstra1'), session('id_ekstra2'), session('id_ekstra3'), session('id_ekstra4')];

        // RegistrasiEkstrakurikuler::create([
        //     'id_registrasi' => Str::uuid(),
        //     'id_siswa' => $idUser4,
        //     'id_pengurus' => $id_pengurus[0],
        //     'id_ekstrakurikuler' => $id_ekstra[0]
        // ]);
        // RegistrasiEkstrakurikuler::create([
        //     'id_registrasi' => Str::uuid(),
        //     'id_siswa' => $idUser9,
        //     'id_pengurus' => $id_pengurus[1],
        //     'id_ekstrakurikuler' => $id_ekstra[1]
        // ]);
        // RegistrasiEkstrakurikuler::create([
        //     'id_registrasi' => Str::uuid(),
        //     'id_siswa' => $idUser10,
        //     'id_pengurus' => $id_pengurus[2],
        //     'id_ekstrakurikuler' => $id_ekstra[2]
        // ]);
        // RegistrasiEkstrakurikuler::create([
        //     'id_registrasi' => Str::uuid(),
        //     'id_siswa' => $idUser11,
        //     'id_pengurus' => $id_pengurus[3],
        //     'id_ekstrakurikuler' => $id_ekstra[3]
        // ]);
        // RegistrasiEkstrakurikuler::create([
        //     'id_registrasi' => Str::uuid(),
        //     'id_siswa' => $idUser12,
        //     'id_pengurus' => $id_pengurus[3],
        //     'id_ekstrakurikuler' => $id_ekstra[3]
        // ]);

    }
}
