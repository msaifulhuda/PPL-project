<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use App\Models\KelasMataPelajaran;
use Illuminate\Http\Request;

class GuruLmsController extends Controller
{
    public function index()
    {
        return view('guru.lms.index');
    }

    public function materi()
    {

        $data = [
            'kelas_pelajaran' => KelasMataPelajaran::all()
        ];

        return view('guru.lms.materi');
    }

    public function materiCreate()
    {
        return view('guru.lms.materi.create');
    }
}
