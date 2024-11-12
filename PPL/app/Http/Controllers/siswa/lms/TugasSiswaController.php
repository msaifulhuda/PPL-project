<?php

namespace App\Http\Controllers\siswa\lms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TugasSiswaController extends Controller
{
    public function index() {}

    public function detail($id)
    {
        return view('siswa.lms.detail_tugas');
    }
}
