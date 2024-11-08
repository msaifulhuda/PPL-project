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
        function randomDate($startDate, $endDate)
        {
            // Mengonversi tanggal awal dan akhir ke timestamp
            $startTimestamp = strtotime($startDate);
            $endTimestamp = strtotime($endDate);

            // Mendapatkan timestamp acak di antara tanggal awal dan akhir
            $randomTimestamp = rand($startTimestamp, $endTimestamp);

            // Mengonversi timestamp acak ke format tanggal
            return date("Y-m-d H:i:s", $randomTimestamp);
        }

        // date
        $startDate = "2024-07-03 00:00:00";
        $endDate = "2024-07-10 23:59:59";
        $startDate2 = "2024-07-11 00:00:00";
        $endDate2 = "2024-07-28 23:59:59";
        $jenis_buku_id = Str::uuid();

        jenis_buku::create([
            'id_jenis_buku' => $jenis_buku_id,
            'nama_jenis_buku' => 'Non-Paket'
        ]);

        $kategori = ['Komik', 'Komik', 'Jurnal', 'Komik', 'Novel', 'Ensiklopedia', 'Novel', 'Ensiklopedia', 'Kamus', 'Artikel', 'Novel', 'Jurnal', 'Biografi'];
        foreach (range(0, count($kategori) - 1) as $number) {
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
                'tgl_ditambahkan' => randomDate($startDate, $endDate),
            ]);

            transaksi_peminjaman::create([
                'id_transaksi_peminjaman' => $transaksi_peminjaman_id,
                'id_buku' => $buku_id,
                'kode_peminjam' => 'Unknown',
                'tgl_awal_peminjaman' => randomDate($startDate, $endDate),
                'tgl_pengembalian' => randomDate($startDate2, $endDate2),
                'denda' => 1000,
                'status_pengembalian' => 1,
                'jenis_peminjam' => 1,
                'status_denda' => 1,
            ]);
        };
    }
}
