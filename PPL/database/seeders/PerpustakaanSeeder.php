<?php

namespace Database\Seeders;

use App\Models\buku;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerpustakaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buku_id1 = Str::uuid();
        buku::create([
            'id_buku' => $buku_id1,
            'author_buku' => 'DimOiOiTujuhLhapanJr',
            'publisher_buku' => 'JAGGS',
            'judul_buku' => 'Tutorial Membuat Lorem Ipsum.',
            'foto_buku' => asset('images/Perpustakaan/Dummies/Narutos.jpg'),
            'tahun_terbit' => 2024,
            'bahasa_buku' => 'Chinese',
            'stok_buku' => 10,
            'rak_buku' => 5,
            'tgl_ditambahkan' => now(),
        ]);
    }
}
