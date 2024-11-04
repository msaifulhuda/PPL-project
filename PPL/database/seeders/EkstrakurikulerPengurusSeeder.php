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
        $id_ekstra1 = Str::uuid();
        $id_ekstra2 = Str::uuid();
        $id_ekstra3 = Str::uuid();
        $id_ekstra4 = Str::uuid();
        session(['id_ekstra1' => $id_ekstra1, 'id_ekstra2' => $id_ekstra2, 'id_ekstra3' => $id_ekstra3, 'id_ekstra4' => $id_ekstra4]);

        Ekstrakurikuler::create([
            'id_ekstrakurikuler' => $id_ekstra1,
            'guru_id' => $guruid[0],
            'nama_ekstrakurikuler' => 'Pramuka',
            'deskripsi' => 'Pramuka adalah kegiatan ekstrakurikuler yang bertujuan untuk membentuk karakter siswa.',
            'gambar' => 'test',
        ]);

        Ekstrakurikuler::create([
            'id_ekstrakurikuler' => $id_ekstra2,
            'guru_id' => $guruid[1],
            'nama_ekstrakurikuler' => 'Paskibra',
            'deskripsi' => 'Paskibra adalah kegiatan ekstrakurikuler yang bertujuan untuk membentuk karakter siswa.',
            'gambar' => '',
        ]);

        Ekstrakurikuler::create([
            'id_ekstrakurikuler' => $id_ekstra3,
            'guru_id' => $guruid[2],
            'nama_ekstrakurikuler' => 'PMR',
            'deskripsi' => 'PMR adalah kegiatan ekstrakurikuler yang bertujuan untuk membentuk karakter siswa.',
            'gambar' => '',
        ]);

        Ekstrakurikuler::create([
            'id_ekstrakurikuler' => $id_ekstra4,
            'guru_id' => $guruid[3],
            'nama_ekstrakurikuler' => 'Tafidz',
            'deskripsi' => 'Tafidz adalah kegiatan ekstrakurikuler yang bertujuan untuk membentuk karakter siswa.',
            'gambar' => '',
        ]);

        // Pengurus
        $id_pengurus1 = Str::uuid();
        $id_pengurus2 = Str::uuid();
        $id_pengurus3 = Str::uuid();
        $id_pengurus4 = Str::uuid();
        session(['id_pengurus1' => $id_pengurus1, 'id_pengurus2' => $id_pengurus2, 'id_pengurus3' => $id_pengurus3, 'id_pengurus4' => $id_pengurus4]);

        $siswa = [session('siswa2'), session('siswa3'), session('siswa4'), session('siswa5')];

        PengurusEkstra::create([
            'id_pengurus_ekstra' => $id_pengurus1,
            'id_ekstrakurikuler' => $id_ekstra1,
            'id_siswa' => $siswa[0],
        ]);
        PengurusEkstra::create([
            'id_pengurus_ekstra' => $id_pengurus2,
            'id_ekstrakurikuler' => $id_ekstra2,
            'id_siswa' => $siswa[1],
        ]);
        PengurusEkstra::create([
            'id_pengurus_ekstra' => $id_pengurus3,
            'id_ekstrakurikuler' => $id_ekstra3,
            'id_siswa' => $siswa[2],
        ]);
        PengurusEkstra::create([
            'id_pengurus_ekstra' => $id_pengurus4,
            'id_ekstrakurikuler' => $id_ekstra4,
            'id_siswa' => $siswa[3],
        ]);
    }
}
