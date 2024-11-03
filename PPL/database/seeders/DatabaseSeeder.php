<?php

namespace Database\Seeders;

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
            'id_admin'=>$idUser1,
            'username' => 'admin',
            'password' => bcrypt('admin123')
        ,
        ]);
        Staffperpus::create([
            'id_staff_perpustakaan'=>$idUser2,
            'username' => 'perpus',
            'password' => bcrypt('perpus123')
        ,
        ]);
        $idUser3 = Str::uuid(); 
        Staffakademik::create([
        'id_staff_akademik'=>$idUser3,
        'username' => '123456789999',
        'password' => bcrypt('Akademik123')
        ,
        ]);
        // Generate UUIDs
        $idUser4 = Str::uuid();
        $idUser5 = Str::uuid();

        // Create siswa with role 'siswa'
        Siswa::create([
            'id_siswa' => $idUser4,
            'username' => '123456789012',
            'password' => bcrypt('Ambatukam123'),
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
    }
}

