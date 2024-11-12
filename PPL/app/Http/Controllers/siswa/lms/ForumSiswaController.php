<?php

namespace App\Http\Controllers\siswa\lms;

use App\Http\Controllers\Controller;
use App\Models\kelas_mata_pelajaran;
use Illuminate\Http\Request;

class ForumSiswaController extends Controller
{
    public function index($id) {
        $kelasMataPelajaran = kelas_mata_pelajaran::with('mataPelajaran', 'guru')
            ->where('id_kelas_mata_pelajaran', $id)
            ->first();
        return view('siswa.lms.detail_kelas_mata_pelajaran.index', [
            "id" => $kelasMataPelajaran->id_kelas_mata_pelajaran,
            "mataPelajaran" => $kelasMataPelajaran->mataPelajaran,
            "guru" => $kelasMataPelajaran->guru,
            "waktu_mulai" => $kelasMataPelajaran->waktu_mulai,
            "waktu_selesai" => $kelasMataPelajaran->waktu_selesai,
            "hari" => $kelasMataPelajaran->hari,
        ]);
    }
}
