<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        // $currentGuard = auth()->getDefaultDriver();
        // dd($currentGuard);
        return view('guru.dashboard');
    }
}
