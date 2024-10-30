<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\mata_pelajaran;

class MatpelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        mata_pelajaran::create([
            'nama_matpel'=>'IPA',
        ]);
        mata_pelajaran::create([
            'nama_matpel'=>'IPS',
        ]);
        mata_pelajaran::create([
            'nama_matpel'=>'Matematika',
        ]);
        mata_pelajaran::create([
            'nama_matpel'=>'Indo',
        ]);
        mata_pelajaran::create([
            'nama_matpel'=>'Inggris',
        ]);
        mata_pelajaran::create([
            'nama_matpel'=>'Daerah',
        ]);
    }
}
