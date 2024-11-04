<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\PengurusEkstra;
use App\Models\Ekstrakurikuler;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EkstrakurikulerPengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve guru IDs from config
        $guruid = [session('guruid2'), session('guruid7'), session('guruid8'), session('guruid9')];

        // Create Ekstrakurikuler entries and store their IDs
        $ekstrakurikulerIds = [];

        $ekstrakurikulerIds[] = Ekstrakurikuler::create([
            'id_ekstrakurikuler' => Str::uuid(),
            'guru_id' => $guruid[0],
            'nama_ekstrakurikuler' => 'Pramuka',
            'deskripsi' => 'Pramuka adalah kegiatan ekstrakurikuler yang bertujuan untuk membentuk karakter siswa.',
            'gambar' => 'test',
        ])->id_ekstrakurikuler;

        $ekstrakurikulerIds[] = Ekstrakurikuler::create([
            'id_ekstrakurikuler' => Str::uuid(),
            'guru_id' => $guruid[1],
            'nama_ekstrakurikuler' => 'Paskibra',
            'deskripsi' => 'Paskibra adalah kegiatan ekstrakurikuler yang bertujuan untuk membentuk karakter siswa.',
            'gambar' => '',
        ])->id_ekstrakurikuler;

        $ekstrakurikulerIds[] = Ekstrakurikuler::create([
            'id_ekstrakurikuler' => Str::uuid(),
            'guru_id' => $guruid[2],
            'nama_ekstrakurikuler' => 'PMR',
            'deskripsi' => 'PMR adalah kegiatan ekstrakurikuler yang bertujuan untuk membentuk karakter siswa.',
            'gambar' => '',
        ])->id_ekstrakurikuler;

        $ekstrakurikulerIds[] = Ekstrakurikuler::create([
            'id_ekstrakurikuler' => Str::uuid(),
            'guru_id' => $guruid[3],
            'nama_ekstrakurikuler' => 'Tafidz',
            'deskripsi' => 'Tafidz adalah kegiatan ekstrakurikuler yang bertujuan untuk membentuk karakter siswa.',
            'gambar' => '',
        ])->id_ekstrakurikuler;

        // Pengurus
        $siswa = [session('siswa2'), session('siswa3'), session('siswa4'), session('siswa5')];

        PengurusEkstra::create([
            'id_pengurus_ekstra' => Str::uuid(),
            'id_ekstrakurikuler' => $ekstrakurikulerIds[0],
            'id_siswa' => $siswa[0],
        ]);
        PengurusEkstra::create([
            'id_pengurus_ekstra' => Str::uuid(),
            'id_ekstrakurikuler' => $ekstrakurikulerIds[1],
            'id_siswa' => $siswa[1],
        ]);
        PengurusEkstra::create([
            'id_pengurus_ekstra' => Str::uuid(),
            'id_ekstrakurikuler' => $ekstrakurikulerIds[2],
            'id_siswa' => $siswa[2],
        ]);
        PengurusEkstra::create([
            'id_pengurus_ekstra' => Str::uuid(),
            'id_ekstrakurikuler' => $ekstrakurikulerIds[3],
            'id_siswa' => $siswa[3],
        ]);
    }
}
