<?php

namespace App\Http\Controllers\siswa;

use App\Models\KelasSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kelas_mata_pelajaran;

class SiswaLmsController extends Controller
{
    public function index()
    {
        $id_siswa = auth()->guard('web-siswa')->user()->id_siswa;
        $kelas = KelasSiswa::with('kelas')->where('id_siswa', $id_siswa)->firstOrFail()->kelas;
        $mataPelajaranList = kelas_mata_pelajaran::where('kelas_id', $kelas->id_kelas)
            ->with(['mataPelajaran', 'guru'])
            ->get();
        return view('siswa.lms.index',[
            'mataPelajaranList' => $mataPelajaranList
        ]);
    }

    public function materi()
    {
        return view('siswa.lms.materi');
    }
}
