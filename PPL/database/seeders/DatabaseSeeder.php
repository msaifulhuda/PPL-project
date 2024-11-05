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
        // Create siswa with role 'siswa'
        $idUser4 = Str::uuid();
        $idUser9 = Str::uuid();
        $idUser10 = Str::uuid();
        $idUser11 = Str::uuid();
        $idUser12 = Str::uuid();

        // Create siswa with role 'pengurus'
        $idUser5 = Str::uuid();
        $idUser6 = Str::uuid();
        $idUser7 = Str::uuid();
        $idUser8 = Str::uuid();

        session(['siswa2' => $idUser5, 'siswa3' => $idUser6, 'siswa4' => $idUser7, 'siswa5' => $idUser8]);

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

        // Create siswa with role 'pengurus'
        Siswa::create([
            'id_siswa' => $idUser5,
            'username' => 'pengurus1',
            'password' => bcrypt('pengurus1'),
            'role_siswa' => 'pengurus',
        ]);
        Siswa::create([
            'id_siswa' => $idUser6,
            'username' => 'pengurus2',
            'password' => bcrypt('pengurus2'),
            'role_siswa' => 'pengurus',
        ]);
        Siswa::create([
            'id_siswa' => $idUser7,
            'username' => 'pengurus3',
            'password' => bcrypt('pengurus3'),
            'role_siswa' => 'pengurus',
        ]);
        Siswa::create([
            'id_siswa' => $idUser8,
            'username' => 'pengurus4',
            'password' => bcrypt('pengurus4'),
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
