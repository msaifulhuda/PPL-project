<?php

namespace Database\Seeders;

use App\Models\tahun_ajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tahun_ajaran::create([
            'tahun_mulai'=>'2023',
            'tahun_selesai'=>'2024',
            'semester'=>2,
            'aktif'=>1,
        ]);
    }
}
