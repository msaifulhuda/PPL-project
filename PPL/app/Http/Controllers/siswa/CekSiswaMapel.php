<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\kelas_mata_pelajaran;
use App\Models\KelasSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class CekSiswaMapel extends Controller
{
    public function cekMapel()
    {
        $id_siswa = "021e33db-44d8-3c1d-80df-718ff9edb395";
        $siswa = Siswa::with('kelasSiswa')->find($id_siswa);
        $kelas = KelasSiswa::with('kelas')->where('id_siswa', $id_siswa)->firstOrFail()->kelas;
        echo "Mata Pelajaran yang Diampu oleh " . $siswa->nama_siswa . "<br>";
        echo "Kelas: " . $kelas->nama_kelas . "<br><br>";
        $mataPelajaranList = kelas_mata_pelajaran::where('kelas_id', $kelas->id_kelas)
            ->with(['mataPelajaran', 'guru'])
            ->get();
        echo "Daftar Mata Pelajaran:<br>";

        foreach ($mataPelajaranList as $kelasMataPelajaran) {
            echo "- Mata Pelajaran: " . $kelasMataPelajaran->mataPelajaran->nama_matpel . "<br>";
            echo "  Guru: " . $kelasMataPelajaran->guru->nama_guru . "<br><br>";
        }
    }
}
