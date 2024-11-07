<?php

namespace App\Http\Controllers\beranda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function home()
    {
        return view('beranda.home');
    }

    public function perpustakaan(){
        return view('beranda.perpustakaan');
    }
}
