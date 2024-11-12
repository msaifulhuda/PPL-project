<?php

namespace App\Http\Controllers\siswa\lms;

use App\Http\Controllers\Controller;
use App\Models\kelas_mata_pelajaran;
use Illuminate\Http\Request;

class AnggotaSiswaController extends Controller
{
    public function index($id)
    {
        $kelasMataPelajaran = kelas_mata_pelajaran::with([
            'mataPelajaran:id_matpel,nama_matpel',
            'tugas:id_tugas,judul,created_at,kelas_mata_pelajaran_id',
            'topik:id_topik,judul_topik,created_at,kelas_mata_pelajaran_id'
        ])->findOrFail($id);

        return view('siswa.lms.anggota', [
            'id' => $kelasMataPelajaran->id_kelas_mata_pelajaran,
            'mataPelajaran' => $kelasMataPelajaran->mataPelajaran,
            'listTugas' => $kelasMataPelajaran->tugas,
        ]);
    }
}
