<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruLmsController extends Controller
{
    public function index()
    {
        return view('guru.lms.index');
    }

    public function materi()
    {
        return view('guru.lms.materi');
    }
}
