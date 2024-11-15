<?php

namespace Database\Seeders;

use App\Models\buku;
use App\Models\jenis_buku;
use App\Models\kategori_buku;
use App\Models\transaksi_peminjaman;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

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

        $jenis_buku_id = Str::uuid();

        jenis_buku::create([
            'id_jenis_buku' => $jenis_buku_id,
            'nama_jenis_buku' => 'Non-Paket'
        ]);

        $kategori = ['Komik', 'Novel', 'Ensiklopedia', 'Kamus', 'Artikel', 'Jurnal', 'Biografi'];
        foreach (range(0, count($kategori) - 1) as $kategoriIndex) {
            $kategori_id = Str::uuid();
            kategori_buku::create([
                'id_kategori_buku' => $kategori_id,
                'nama_kategori' => $kategori[$kategoriIndex]
            ]);
            $ArrayCategory[] = [$kategori_id, $kategori[$kategoriIndex]];
        }
        $ArrayCategory = collect($ArrayCategory);

        foreach (range(0, 84) as $number) {
            $buku_id = Str::uuid();
            $transaksi_peminjaman_id = Str::uuid();

            // date addbook
            $startDate = "2024-01-03 00:00:00";
            $endDate = "2024-03-10 23:59:59";
            // date Transaction
            $startDate2 = "2024-04-11 00:00:00";
            $endDate2 = "2024-07-11 00:00:00";
            // date backbook
            $endDate3 = date('Y-m-d H:i:s', strtotime($endDate2 . ' +7 days'));

            $kategori_id =  $ArrayCategory->random()[0];
            $kategori_name =  $ArrayCategory->random()[1];

            buku::create([
                'id_buku' => $buku_id,
                'id_kategori_buku' => $kategori_id,
                'id_jenis_buku' => $jenis_buku_id,
                'author_buku' => 'Pembuat' . $kategori_id,
                'publisher_buku' => 'JAGGS',
                'judul_buku' => 'Tutorial Membuat Lorem Ipsum.',
                'foto_buku' => 'images/Perpustakaan/Dummies/Narutos.jpg',
                'tahun_terbit' => 2024,
                'bahasa_buku' => 'Chinese',
                'stok_buku' => rand(1, 20),
                'rak_buku' => rand(1, 10),
                'tgl_ditambahkan' => randomDate($startDate, $endDate),
                'harga_buku' => rand(20000, 300000)
            ]);

            if ($number >= 80) {
                $startDate2 = now();
                $endDate2 = Carbon::now()->subDays(7)->toDateString();
                // date backbook
                $endDate3 = date('Y-m-d H:i:s', strtotime($endDate2 . ' +7 days'));
            }

            transaksi_peminjaman::create([
                'id_transaksi_peminjaman' => $transaksi_peminjaman_id,
                'id_buku' => $buku_id,
                'kode_peminjam' => 'Unknown',
                'tgl_awal_peminjaman' => randomDate($startDate2, $endDate2),
                'tgl_pengembalian' => $endDate3,
                'denda' => 0,
                'status_pengembalian' => rand(0, 2), // 0 : Belum Dikembalikan 1 : Sudah Dikembalikan 2 : Hilang
                'jenis_peminjam' => rand(0, 1), // 0 : False, 1 : True
                'status_denda' => rand(0, 1), // 0 : False, 1 : True
            ]);
        };
    }
}
