<?php

namespace Database\Seeders;

use App\Models\buku;
use App\Models\jenis_buku;
use App\Models\kategori_buku;
use App\Models\transaksi_peminjaman;
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
        $jenis_buku_id = Str::uuid();

        jenis_buku::create([
            'id_jenis_buku' => $jenis_buku_id,
            'nama_jenis_buku' => 'Non-Paket'
        ]);

        $kategori = ['Komik', 'Novel', 'Ensiklopedia', 'Kamus', 'Artikel', 'Jurnal', 'Biografi'];
        foreach (range(0, 6) as $number) {
            $kategori_id = Str::uuid();
            $buku_id = Str::uuid();
            $transaksi_peminjaman_id = Str::uuid();


            kategori_buku::create([
                'id_kategori_buku' => $kategori_id,
                'nama_kategori' => $kategori[$number]
            ]);

            buku::create([
                'id_buku' => $buku_id,
                'id_kategori_buku' => $kategori_id,
                'id_jenis_buku' => $jenis_buku_id,
                'author_buku' => 'Pembuat' . $kategori[$number],
                'publisher_buku' => 'JAGGS',
                'judul_buku' => 'Tutorial Membuat Lorem Ipsum.',
                'foto_buku' => asset('images/Perpustakaan/Dummies/Narutos.jpg'),
                'tahun_terbit' => 2024,
                'bahasa_buku' => 'Chinese',
                'stok_buku' => 10,
                'rak_buku' => 1,
                'tgl_ditambahkan' => now(),
            ]);

            // transaksi_peminjaman::create([
            //     'id_transaksi_peminjaman' => $transaksi_peminjaman_id,
            //     'id_buku' => $buku_id,
            //     'kode_peminjam' => 'Unknown',
            //     'tgl_awal_peminjaman' => now(),
            //     'tgl_pengembalian' => now(),
            //     'denda' => 1000,
            //     'status_pengembalian' => 1,
            //     'jenis_peminjam' => 1,
            //     'status_denda' => 1,
            // ]);
        };
    }
}
