<?php

namespace App\Http\Controllers\guru\lms;

use App\Models\KelasSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kelas_mata_pelajaran;

class NilaiKelasController extends Controller
{
    public function index($id)
    {
        $kelasMataPelajaran = kelas_mata_pelajaran::with([
            'mataPelajaran:id_matpel,nama_matpel',
            'kelas:id_kelas,nama_kelas',
        ])->findOrFail($id);

        $kelasId = $kelasMataPelajaran->kelas->id_kelas;
        $anggotaKelas = KelasSiswa::with('siswa:id_siswa,nama_siswa,email') //
            ->where('id_kelas', $kelasId)
            ->get()
            ->pluck('siswa');



        return view('guru.lms.nilai_kelas', [
            'id' => $kelasMataPelajaran->id_kelas_mata_pelajaran,
            'mataPelajaran' => $kelasMataPelajaran->mataPelajaran,
            'anggotaKelas' => $anggotaKelas,
            'jumlahAnggota' => $anggotaKelas->count(),
            'kelas' => $kelasMataPelajaran->kelas,
        ]);
    }

}
