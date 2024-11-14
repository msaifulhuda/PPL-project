<?php

namespace App\Http\Controllers\guru\lms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateriGuruController extends Controller
{
    public function index()
    {
        return view('guru.lms.materi');
    }

    public function detail($id)
    {
        return view('guru.lms.detail_materi', ['id' => $id]);
    }
}
