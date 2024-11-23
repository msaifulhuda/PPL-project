<?php

namespace App\Http\Controllers\beranda;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Staffakademik;
use App\Models\Staffperpus;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function home(){
        return view('beranda.home');
    }

    public function perpustakaanPublik(){
        return view('beranda.perpustakaanPublik');
    }

    public function tenagaPengajarPublik(){
        $guru = Guru::all();
        $staff_akademik = Staffakademik::all();
        $staff_perpustakaan = Staffperpus::all();
        return view('beranda.tenagaPengajarPublik', compact('guru', 'staff_akademik', 'staff_perpustakaan'));
    }

    public function prestasiPublik(){
        return view('beranda.prestasiPublik');
    }
}
