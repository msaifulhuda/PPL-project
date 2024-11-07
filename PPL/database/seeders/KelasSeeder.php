<?php

namespace Database\Seeders;

use App\Models\kelas;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 classes
        for ($i = 1; $i <= 10; $i++) {
            $idKelas = Str::uuid();
            kelas::create([
                'id_kelas' => $idKelas,
                'nama_kelas' => 'Kelas ' . $i,
            ]);
        }
    }
}
