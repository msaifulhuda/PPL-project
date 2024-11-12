<?php

namespace Database\Seeders;

use App\Models\kelas_mata_pelajaran;
use Illuminate\Database\Seeder;
use App\Models\Topik;
use App\Models\Materi;
use App\Models\Tugas;
use App\Models\KelasMataPelajaran;

class TopikTugasMateriSeeder extends Seeder
{
    public function run()
    {
        // Retrieve all kelas_mata_pelajaran records
        $kelasMataPelajaranRecords = kelas_mata_pelajaran::all();

        foreach ($kelasMataPelajaranRecords as $kelas) {
            // For each kelas_mata_pelajaran, create 3 topik entries
            for ($i = 1; $i <= 3; $i++) {
                $topik = Topik::create([
                    'mata_pelajaran_id' => $kelas->mata_pelajaran_id,
                    'judul_topik' => "Bab $i",
                    'kelas_mata_pelajaran_id' => $kelas->id_kelas_mata_pelajaran,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                for ($j = 1; $j <= 2; $j++) {
                    Materi::create([
                        'judul_materi' => "Materi $j untuk Bab $i",
                        'topik_id' => $topik->id_topik,
                        'kelas_mata_pelajaran_id' => $kelas->id_kelas_mata_pelajaran,
                        'tanggal_dibuat' => now()->toDateString(),
                        'created_at' => now(),
                        'updated_at' => now(),
                        'status' => 1,
                    ]);
                }

                // For each topik, create 2 tugas entries
                for ($k = 1; $k <= 2; $k++) {
                    Tugas::create([
                        'judul' => "Tugas $k untuk Bab $i",
                        'deskripsi' => "Deskripsi untuk Tugas $k di Bab $i",
                        'topik_id' => $topik->id_topik,
                        'kelas_mata_pelajaran_id' => $kelas->id_kelas_mata_pelajaran,
                        'deadline' => now()->addDays(7),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
