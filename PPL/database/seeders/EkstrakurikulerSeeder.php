<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berkas;
use Illuminate\Support\Str;
use App\Models\PengurusEkstra;
use App\Models\Ekstrakurikuler;
use Illuminate\Database\Seeder;
use App\Models\HistoriInventaris;
use App\Models\PrestasiEkstrakurikuler;
use App\Models\InventarisEkstrakurikuler;
use App\Models\LaporanPenilaianEkstrakurikuler;
use App\Models\RegistrasiEkstrakurikuler;

class EkstrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $guruIds = Guru::where('role_guru', 'pembina')->pluck('id_guru')->toArray();
        $nama_ekstra = ['Pramuka', 'PMR', 'Paskibra', 'Tahfidz', 'Basket', 'Volly', 'Futsal'];

        /**
         * Mengisi ekstrakurikuler.
         */
        foreach ($nama_ekstra as $ekstra){
            Ekstrakurikuler::create([
                'id_ekstrakurikuler' => Str::uuid(),
                'guru_id' => $guruIds[array_rand($guruIds)],
                'nama_ekstrakurikuler' => $ekstra,
                'deskripsi' => 'Pramuka adalah kegiatan ekstrakurikuler yang bertujuan untuk membentuk karakter siswa.',
                'gambar' => '-',
                'status' => 'tidak buka',
            ]);
        }

        /**
         * Mengisi pengurus ekstrakurikuler.
         */
        $idEkstra = Ekstrakurikuler::pluck('id_ekstrakurikuler')->toArray();
        $idPengurus = Siswa::where('role_siswa', 'pengurus')->pluck('id_siswa')->toArray();

        foreach ($idPengurus as $pengurus){
            PengurusEkstra::create([
                'id_pengurus_ekstra' => Str::uuid(),
                'id_ekstrakurikuler' => $idEkstra[array_rand($idEkstra)],
                'id_siswa' => $pengurus,
            ]);
        }

        /**
         * Mengisi registrasi ekstrakurikuler.
         */
        $idSiswa = Siswa::where('role_siswa', 'siswa')->pluck('id_siswa')->toArray();
        foreach ($idSiswa as $siswa){
            RegistrasiEkstrakurikuler::create([
                'id_registrasi' => Str::uuid(),
                'id_siswa' => $siswa,
                'id_ekstrakurikuler' => $idEkstra[array_rand($idEkstra)],
                'status' => collect(['diterima', 'ditolak', 'menunggu'])->random(),
                'alasan' => '-',
            ]);
        }

        /**
         * Mengisi berkas.
         */
        $idRegistrasi = RegistrasiEkstrakurikuler::pluck('id_registrasi')->toArray();
        foreach ($idRegistrasi as $registrasi){
            Berkas::create([
                'id_berkas' => Str::uuid(),
                'id_registrasi' => $registrasi,
                'surat_izin_ortu' => collect(['berkas1.pdf', 'berkas2.pdf', 'berkas3.pdf'])->random(),
                'surat_riwayat_penyakit' => collect(['berkas1.pdf', 'berkas2.pdf', 'berkas3.pdf'])->random()
            ]);
        }

        /**
         * Mengisi laporan penilaian ekstrakurikuler.
         */
        foreach ($idEkstra as $index => $ekstra){
            $idAnggota = RegistrasiEkstrakurikuler::whereIn('id_siswa', $idSiswa)->where('status', 'diterima')->where('id_ekstrakurikuler', $ekstra)->pluck('id_siswa')->toArray();
            foreach ($idAnggota as $anggota){
                LaporanPenilaianEkstrakurikuler::create([
                    'id_laporan' => Str::uuid(),
                    'id_siswa' => $anggota,
                    'id_ekstrakurikuler' => $ekstra,
                    'isi_laporan' => 'Deskripsi laporan penilaian ekstrakurikuler ' . $nama_ekstra[$index],
                ]);
            }
        }


        /**
         * Mengisi prestasi ekstrakurikuler.
         */
        foreach ($idEkstra as $ekstra){
            PrestasiEkstrakurikuler::create([
                'id_prestasi' => Str::uuid(),
                'id_ekstrakurikuler' => $ekstra,
                'judul' => collect([
                    'Juara 1 Lomba ' . $nama_ekstra[array_rand($nama_ekstra)], 
                    'Juara 2 Lomba ' . $nama_ekstra[array_rand($nama_ekstra)], 
                    'Juara 3 Lomba ' . $nama_ekstra[array_rand($nama_ekstra)]
                ])->random(),
                'deskripsi' => collect(['Deskripsi prestasi 1', 'Deskripsi prestasi 2', 'Deskripsi prestasi 3'])->random(),
                'gambar' => collect(['gambar1.jpg', 'gambar2.jpg', 'gambar3.jpg'])->random(),
            ]);
        }

        /**
         * Mengisi inventaris ekstrakurikuler.
         */
        for ($i = 0; $i < 100; $i++) {
            InventarisEkstrakurikuler::create([
            'id_inventaris' => Str::uuid(),
            'id_ekstrakurikuler' => $idEkstra[array_rand($idEkstra)],
            'nama_barang' => collect(['Bendera', 'Tenda', 'Bola', 'Net', 'Seragam'])->random(),
            'stok' => rand(1, 100),
            ]);
        }

        /**
         * Mengisi histori inventaris.
         */
        $idInventaris = InventarisEkstrakurikuler::pluck('id_inventaris')->toArray();

        foreach ($idInventaris as $inventaris) {
            for ($j = 0; $j < 3; $j++) {
            HistoriInventaris::create([
                'id_histori' => Str::uuid(),
                'id_inventaris' => $inventaris,
                'keterangan' => collect(['Peminjaman', 'Pengembalian', 'Perbaikan'])->random(),
                'jumlah' => rand(1, 10),
                'histori_keluar' => now(),
                'histori_masuk' => now(),
            ]);
            }
        }
    }
}
