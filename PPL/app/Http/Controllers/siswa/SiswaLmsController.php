<?php

namespace App\Http\Controllers\siswa;

use App\Models\KelasSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kelas_mata_pelajaran;

class SiswaLmsController extends Controller
{
    



    public function materi()
    {
        return view('siswa.lms.materi');
    }
}
