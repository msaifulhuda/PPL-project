<?php

namespace App\Http\Controllers\siswa\lms;

use App\Http\Controllers\Controller;

class MateriSiswaController extends Controller
{
    public function detail($id)
    {
        return view('siswa.lms.detail_materi');
    }
}
