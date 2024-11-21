<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\hari;
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
            ['guru_nama' => 'Agus Santoso', 'mata_pelajaran' => 'Matematika'],
            ['guru_nama' => 'Siti Aisyah', 'mata_pelajaran' => 'Bahasa Indonesia'],
            ['guru_nama' => 'Budi Setiawan', 'mata_pelajaran' => 'Bahasa Inggris'],
            ['guru_nama' => 'Eka Pratama', 'mata_pelajaran' => 'IPA'],
            ['guru_nama' => 'Dewi Kartika', 'mata_pelajaran' => 'IPS'],
            ['guru_nama' => 'Rini Marlina', 'mata_pelajaran' => 'PKN'],
            ['guru_nama' => 'Fajar Hidayat', 'mata_pelajaran' => 'Seni Budaya'],
            ['guru_nama' => 'Sri Wahyuni', 'mata_pelajaran' => 'Pendidikan Agama'],
            ['guru_nama' => 'Yoga Aditya', 'mata_pelajaran' => 'Pendidikan Jasmani'],
            ['guru_nama' => 'Rahmawati Anisa', 'mata_pelajaran' => 'TIK'],
            ['guru_nama' => 'Andi Prakoso', 'mata_pelajaran' => 'Prakarya'],
            ['guru_nama' => 'Lina Kusuma', 'mata_pelajaran' => 'Bahasa Madura'],
        ];

        $hari = hari::all()->first()->id_hari;

        foreach ($kelasList as $kelas) {
            foreach ($assignments as $assignment) {
                $guru = Guru::where('nama_guru', $assignment['guru_nama'])->first();
                $matpel = mata_pelajaran::where('nama_matpel', $assignment['mata_pelajaran'])->first();

                if ($guru && $matpel) {
                    kelas_mata_pelajaran::create([
                        'kelas_id' => $kelas->id_kelas,
                        'mata_pelajaran_id' => $matpel->id_matpel,
                        'guru_id' => $guru->id_guru,
                        'hari_id' => $hari,
                        'waktu_mulai' => "10:00",
                        'waktu_selesai' => "12:00",
                        'tahun_ajaran_id' => $tahunAjaran->id_tahun_ajaran,
                    ]);
                }
            }
        }
    }
}
