<?php

namespace App\Http\Controllers\guru;

use App\Models\materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kelas_mata_pelajaran;

class GuruLmsController extends Controller
{
    public function index()
    {
        return view('guru.lms.index');
    }

    public function materi()
    {
        $data['kelas_mata_pelajaran'] = kelas_mata_pelajaran::with('kelas', 'mata_pelajaran')->where('guru_id', auth()->guard(name: 'web-guru')->user()->id_guru)->WhereHas('tahun_ajaran', fn($query) => $query->where('aktif', 1))->get();
        $data['materi'] = materi::whereIn('kelas_mata_pelajaran_id', $data['kelas_mata_pelajaran']->pluck('id_kelas_mata_pelajaran'))->get();
        $data['materi_baru'] = materi::whereIn('kelas_mata_pelajaran_id', $data['kelas_mata_pelajaran']->pluck('id_kelas_mata_pelajaran'))->orderBy('created_at', 'desc')->get();
        $data['materi_baru_date'] = $data['materi_baru']->pluck('created_at')->unique()->values();

        return view('guru.lms.materi', $data);
    }

    public function materiDetail($id)
    {
        $data['materi'] = materi::findOrFail($id);
        return view('guru.lms.materi.detail', $data);
    }

    public function materiCreate()
    {
        return view('guru.lms.materi.create');
    }
}
