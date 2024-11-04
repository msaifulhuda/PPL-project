<?php

namespace Database\Seeders;

use App\Models\ekstrakurikuler;
use App\Models\PengurusEkstra;
use App\Models\Guru;
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
        $idUser6 = Str::uuid();
        $idUser7 = Str::uuid();
        $idUser8 = Str::uuid();

        session(['siswa2' => $idUser5, 'siswa3' => $idUser6, 'siswa4' => $idUser7, 'siswa5' => $idUser8]);

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
    }
}
