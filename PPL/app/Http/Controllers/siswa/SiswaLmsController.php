<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaLmsController extends Controller
{
    public function index()
    {
        return view('siswa.lms.index');
    }

    public function materi()
    {
        return view('siswa.lms.materi');
    }
}
