<?php

namespace App\Http\Controllers\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
        public function index()
    {
        // if (auth()->guard('web-siswa')->check()) {
        //     dd('masuk');
        // }
        return view('siswa.dashboard');
    }
}
