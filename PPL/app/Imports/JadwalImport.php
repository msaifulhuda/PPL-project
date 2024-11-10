<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\Hari;
use App\Models\Guru;
use App\Models\kelas_mata_pelajaran;
use App\Models\mata_pelajaran;
use App\Models\tahun_ajaran;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

class JadwalImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Lewati baris pertama (header)
        $headerSkipped = false;

        // Dapatkan ID tahun ajaran yang aktif
        $tahunAjaran = tahun_ajaran::where('aktif', 1)->first();
        if (!$tahunAjaran) {
            throw new \Exception('Tidak ada tahun ajaran yang aktif ditemukan.');
        }

        foreach ($rows as $row) {
            if (!$headerSkipped) {
                $headerSkipped = true;
                continue;
            }

            $namaKelas = $row[0];
            $namaHari = $row[1];
            $waktuMulai = $row[2];
            $waktuSelesai = $row[3];
            $mataPelajaranNama = $row[4];
            $namaGuru = $row[5];

            // Cari ID kelas berdasarkan nama
            $kelas = Kelas::where('nama_kelas', $namaKelas)->first();
            if (!$kelas) {
                throw new \Exception("Kelas dengan nama '{$namaKelas}' tidak ditemukan.");
            }

            // Cari ID hari berdasarkan nama
            $hari = Hari::where('nama_hari', $namaHari)->first();
            if (!$hari) {
                throw new \Exception("Hari dengan nama '{$namaHari}' tidak ditemukan.");
            }

            // Cari ID mata pelajaran berdasarkan nama
            $mataPelajaran = mata_pelajaran::where('nama_matpel', $mataPelajaranNama)->first();
            if (!$mataPelajaran) {
                throw new \Exception("Mata pelajaran dengan nama '{$mataPelajaranNama}' tidak ditemukan.");
            }

            // Cari ID guru berdasarkan nama
            $guru = Guru::where('nama_guru', $namaGuru)->first();
            if (!$guru) {
                throw new \Exception("Guru dengan nama '{$namaGuru}' tidak ditemukan.");
            }

            // Konversi waktu mulai dan selesai ke format HH:mm
            $waktuMulai = $this->convertExcelTimeToHMS($waktuMulai);
            $waktuSelesai = $this->convertExcelTimeToHMS($waktuSelesai);

            // Insert data ke tabel kelas_mata_pelajaran
            kelas_mata_pelajaran::create([
                'id_kelas_mata_pelajaran' => (string) Str::uuid(),
                'kelas_id' => $kelas->id_kelas,
                'hari_id' => $hari->id_hari,
                'waktu_mulai' => $waktuMulai,
                'waktu_selesai' => $waktuSelesai,
                'guru_id' => $guru->id_guru,
                'mata_pelajaran_id' => $mataPelajaran->id_matpel,
                'tahun_ajaran_id' => $tahunAjaran->id_tahun_ajaran,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    // Fungsi untuk mengkonversi angka desimal waktu ke format HH:mm
    private function convertExcelTimeToHMS($excelTime)
    {
        // Konversi waktu Excel ke jam dan menit
        $hours = floor($excelTime * 24); // Ambil jam
        $minutes = round(($excelTime * 24 - $hours) * 60); // Ambil menit
        return sprintf('%02d:%02d', $hours, $minutes); // Format jam:menit
    }
}
