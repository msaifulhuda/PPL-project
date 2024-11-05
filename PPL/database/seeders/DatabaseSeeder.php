<?php

namespace Database\Seeders;

use App\Models\ekstrakurikuler;
use App\Models\PengurusEkstra;
use App\Models\Guru;
use App\Models\registrasi_ekstrakurikuler;
use App\Models\Siswa;
use App\Models\Staffakademik;
use App\Models\Staffperpus;
use App\Models\Superadmin;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $idUser1 = Str::uuid();
        $idUser2 = Str::uuid();
        Superadmin::create([
            'id_admin' => $idUser1,
            'username' => 'admin',
            'password' => bcrypt('admin123'),
        ]);
        Staffperpus::create([
            'id_staff_perpustakaan' => $idUser2,
            'username' => '123456789101',
            'password' => bcrypt('Perpus123'),
        ]);
        $idUser3 = Str::uuid();
        Staffakademik::create([
            'id_staff_akademik' => $idUser3,
            'username' => '123456789999',
            'password' => bcrypt('Akademik123'),
        ]);
        // Generate UUIDs
        $idUser4 = Str::uuid();
        $idUser5 = Str::uuid();

        // Create siswa with role 'siswa'
        Siswa::create([
            'id_siswa' => $idUser4,
            'username' => 'siswa',
            'password' => bcrypt('siswa'),
            'role_siswa' => 'siswa',
        ]);

        // Create siswa with role 'pengurus'
        Siswa::create([
            'id_siswa' => $idUser5,
            'username' => 'pengurus',
            'password' => bcrypt('pengurus'),
            'role_siswa' => 'pengurus',
        ]);

        $this->call([
            KelasMapelGuruJadwalAjaranSeeder::class,
        ]);
        $this->call([
            EkstrakurikulerPengurusSeeder::class,
        ]);

        // Registrasi Ekstrakurikuler
        $id_pengurus = [session('id_pengurus1'), session('id_pengurus2'), session('id_pengurus3'), session('id_pengurus4')];
        $id_ekstra = [session('id_ekstra1'), session('id_ekstra2'), session('id_ekstra3'), session('id_ekstra4')];

        registrasi_ekstrakurikuler::create([
            'id_registrasi' => Str::uuid(),
            'id_siswa' => $idUser4,
            'id_pengurus' => $id_pengurus[0],
            'id_ekstrakurikuler' => $id_ekstra[0]
        ]);
        registrasi_ekstrakurikuler::create([
            'id_registrasi' => Str::uuid(),
            'id_siswa' => $idUser9,
            'id_pengurus' => $id_pengurus[1],
            'id_ekstrakurikuler' => $id_ekstra[1]
        ]);
        registrasi_ekstrakurikuler::create([
            'id_registrasi' => Str::uuid(),
            'id_siswa' => $idUser10,
            'id_pengurus' => $id_pengurus[2],
            'id_ekstrakurikuler' => $id_ekstra[2]
        ]);
        registrasi_ekstrakurikuler::create([
            'id_registrasi' => Str::uuid(),
            'id_siswa' => $idUser11,
            'id_pengurus' => $id_pengurus[3],
            'id_ekstrakurikuler' => $id_ekstra[3]
        ]);
        registrasi_ekstrakurikuler::create([
            'id_registrasi' => Str::uuid(),
            'id_siswa' => $idUser12,
            'id_pengurus' => $id_pengurus[3],
            'id_ekstrakurikuler' => $id_ekstra[3]
        ]);
    }
}
