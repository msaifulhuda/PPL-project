<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\kelas;
use App\Models\kelas_mata_pelajaran;
use App\Models\mata_pelajaran;
use App\Models\tahun_ajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasMataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahunAjaran = tahun_ajaran::where('aktif', 1)->first();
        if (!$tahunAjaran) {
            echo "No active academic year found.\n";
            return;
        }
        $kelasList = kelas::all();

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

        foreach ($kelasList as $kelas) {
            foreach ($assignments as $assignment) {
                $guru = Guru::where('nama_guru', $assignment['guru_nama'])->first();
                $matpel = mata_pelajaran::where('nama_matpel', $assignment['mata_pelajaran'])->first();

                if ($guru && $matpel) {
                    kelas_mata_pelajaran::create([
                        'kelas_id' => $kelas->id_kelas,
                        'mata_pelajaran_id' => $matpel->id_matpel,
                        'guru_id' => $guru->id_guru,
                        'hari_id' => null,
                        'waktu_mulai' => null,
                        'waktu_selesai' => null,
                        'tahun_ajaran_id' => $tahunAjaran->id_tahun_ajaran,
                    ]);
                }
            }
        }
    }
}
