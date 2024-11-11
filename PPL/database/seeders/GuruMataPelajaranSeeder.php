<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\guru_mata_pelajaran;
use Illuminate\Support\Str;
use App\Models\mata_pelajaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruMataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $guruIds = Guru::pluck('id_guru')->toArray();
        // $mataPelajaranIds = mata_pelajaran::pluck('id_matpel')->toArray();

        // foreach ($guruIds as $guruId) {
        //     $mataPelajaranId = $mataPelajaranIds[array_rand($mataPelajaranIds)];

        //     DB::table('guru_mata_pelajaran')->insert([
        //         'id_guru_mata_pelajaran' => Str::uuid(),
        //         'guru_id' => $guruId,
        //         'matpel_id' => $mataPelajaranId,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        $assignments = [
            ['guru_nama' => 'Guru Matematika', 'mata_pelajaran' => 'Matematika'],
            ['guru_nama' => 'Guru Bahasa Indonesia', 'mata_pelajaran' => 'Bahasa Indonesia'],
            ['guru_nama' => 'Guru Bahasa Inggris', 'mata_pelajaran' => 'Bahasa Inggris'],
            ['guru_nama' => 'Guru IPA', 'mata_pelajaran' => 'IPA'],
            ['guru_nama' => 'Guru IPS', 'mata_pelajaran' => 'IPS'],
            ['guru_nama' => 'Guru PKN', 'mata_pelajaran' => 'PKN'],
            ['guru_nama' => 'Guru Seni Budaya', 'mata_pelajaran' => 'Seni Budaya'],
            ['guru_nama' => 'Guru Pendidikan Agama', 'mata_pelajaran' => 'Pendidikan Agama'],
            ['guru_nama' => 'Guru Pendidikan Jasmani', 'mata_pelajaran' => 'Pendidikan Jasmani'],
            ['guru_nama' => 'Guru TIK', 'mata_pelajaran' => 'TIK'],
            ['guru_nama' => 'Guru Prakarya', 'mata_pelajaran' => 'Prakarya'],
            ['guru_nama' => 'Guru Bahasa Madura', 'mata_pelajaran' => 'Bahasa'],
        ];

        foreach ($assignments as $assignment) {
            $guru = Guru::where('nama_guru', $assignment['guru_nama'])->first();
            $matpel = mata_pelajaran::where('nama_matpel', $assignment['mata_pelajaran'])->first();

            if ($guru && $matpel) {
                guru_mata_pelajaran::create([
                    'guru_id' => $guru->id_guru,
                    'matpel_id' => $matpel->id_matpel,
                ]);
            }
        }

    }
}
