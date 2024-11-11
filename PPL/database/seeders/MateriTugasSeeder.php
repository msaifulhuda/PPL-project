<?php

namespace Database\Seeders;

use App\Models\topik;
use App\Models\materi;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MateriTugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapelid = [session('mapelid1'), session('mapelid2'), session('mapelid3'), session('mapelid4'), session('mapelid5')];
        $kelasmapelid = [session('kelasmapelid1'), session('kelasmapelid2'), session('kelasmapelid3'), session('kelasmapelid4'), session('kelasmapelid5'), session('kelasmapelid6'), session('kelasmapelid7'), session('kelasmapelid8'), session('kelasmapelid9'), session('kelasmapelid10'), session('kelasmapelid11'), session('kelasmapelid12')];

        $topikid1 = Str::uuid();
        $topikid2 = Str::uuid();
        $topikid3 = Str::uuid();
        $topikid4 = Str::uuid();
        $topikid5 = Str::uuid();
        $topikid6 = Str::uuid();

        session(key: ['topikid1' => $topikid1, 'topikid2' => $topikid2, 'topikid3' => $topikid3, 'topikid4' => $topikid4, 'topikid5' => $topikid5, 'topikid6' => $topikid6]);

        $topik = [
            [
                "id_topik" => $topikid1,
                "mata_pelajaran_id" => $mapelid[0],
                "judul_topik" => "Alam, tumbuhan, hewan, dan kehidupan sehari-hari",
                "kelas_mata_pelajaran_id" => $kelasmapelid[0]
            ],
            [
                "id_topik" => $topikid2,
                "mata_pelajaran_id" => $mapelid[0],
                "judul_topik" => "Sistem tata surya",
                "kelas_mata_pelajaran_id" => $kelasmapelid[0]
            ],
            [
                "id_topik" => $topikid3,
                "mata_pelajaran_id" => $mapelid[0],
                "judul_topik" => "Usaha, energi, dan pesawat sederhana",
                "kelas_mata_pelajaran_id" => $kelasmapelid[0]
            ],

            [
                "id_topik" => $topikid4,
                "mata_pelajaran_id" => $mapelid[3],
                "judul_topik" => "Teks prosedur",
                "kelas_mata_pelajaran_id" => $kelasmapelid[5]
            ],
            [
                "id_topik" => $topikid5,
                "mata_pelajaran_id" => $mapelid[3],
                "judul_topik" => "Puisi rakyat",
                "kelas_mata_pelajaran_id" => $kelasmapelid[5]
            ],
            [
                "id_topik" => $topikid6,
                "mata_pelajaran_id" => $mapelid[3],
                "judul_topik" => "Surat pribadi dan surat dinas",
                "kelas_mata_pelajaran_id" => $kelasmapelid[5]
            ],
        ];

        foreach ($topik as $t) {
            topik::create($t);
        }

        $materi = [
            [
                "topik_id" => $topikid1,
                "judul_materi" => "Pengertian Alam",
                "kelas_mata_pelajaran_id" => $kelasmapelid[0],
                "tanggal_dibuat" => now(),
                "status" => 1,
            ],
            [
                "topik_id" => $topikid1,
                "judul_materi" => "Jenis-jenis Tumbuhan",
                "kelas_mata_pelajaran_id" => $kelasmapelid[0],
                "tanggal_dibuat" => now(),
                "status" => 1,
            ],
            [
                "topik_id" => $topikid2,
                "judul_materi" => "Planet-planet dalam Tata Surya",
                "kelas_mata_pelajaran_id" => $kelasmapelid[0],
                "tanggal_dibuat" => now(),
                "status" => 1,
            ],
            [
                "topik_id" => $topikid3,
                "judul_materi" => "Pengertian Usaha dan Energi",
                "kelas_mata_pelajaran_id" => $kelasmapelid[0],
                "tanggal_dibuat" => now(),
                "status" => 1,
            ],
            [
                "topik_id" => $topikid4,
                "judul_materi" => "Langkah-langkah Menulis Teks Prosedur",
                "kelas_mata_pelajaran_id" => $kelasmapelid[5],
                "tanggal_dibuat" => now(),
                "status" => 1,
            ],
            [
                "topik_id" => $topikid5,
                "judul_materi" => "Contoh-contoh Puisi Rakyat",
                "kelas_mata_pelajaran_id" => $kelasmapelid[5],
                "tanggal_dibuat" => now(),
                "status" => 1,
            ],
            [
                "topik_id" => $topikid6,
                "judul_materi" => "Cara Menulis Surat Pribadi",
                "kelas_mata_pelajaran_id" => $kelasmapelid[5],
                "tanggal_dibuat" => now(),
                "status" => 1,
            ],
        ];

        foreach ($materi as $m) {
            materi::create($m);
        }
    }
}
