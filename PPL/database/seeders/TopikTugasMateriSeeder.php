<?php

namespace Database\Seeders;

use App\Models\kelas_mata_pelajaran;
use Illuminate\Database\Seeder;
use App\Models\Topik;
use App\Models\Materi;
use App\Models\Tugas;
use Faker\Factory as Faker;

class TopikTugasMateriSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        // Retrieve all kelas_mata_pelajaran records
        $kelasMataPelajaranRecords = kelas_mata_pelajaran::all();

        foreach ($kelasMataPelajaranRecords as $kelas) {
            $namaMataPelajaran = $kelas->mataPelajaran->nama_matpel;
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
                        'judul_materi' => "Materi $j untuk Bab $i  - $namaMataPelajaran",
                        'topik_id' => $topik->id_topik,
                        'deskripsi' => $faker->paragraphs(3, true),
                        'kelas_mata_pelajaran_id' => $kelas->id_kelas_mata_pelajaran,
                        'created_at' => now(),
                        'updated_at' => now(),
                        'status' => 1,
                    ]);
                }

                // For each topik, create 2 tugas entries
                for ($k = 1; $k <= 2; $k++) {
                    Tugas::create([
                        'judul' => "Tugas $k untuk Bab $i - $namaMataPelajaran",
                        'deskripsi' => $faker->paragraphs(3, true),
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
