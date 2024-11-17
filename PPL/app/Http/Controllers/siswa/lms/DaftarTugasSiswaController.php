<?php

namespace App\Http\Controllers\siswa\lms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarTugasSiswaController extends Controller
{
    public function ditugaskan($id)
    {
        return view('siswa.lms.tracking_tugas', [
            'id' => $id
        ]);
    }
    public function belumDiserahkan($id)
    {
        return view('siswa.lms.tracking_tugas', [
            'id' => $id
        ]);
    }
    public function diserahkan($id)
    {
        return view('siswa.lms.tracking_tugas', [
            'id' => $id
        ]);
    }
}
