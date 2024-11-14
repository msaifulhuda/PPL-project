<?php

namespace App\Http\Controllers\Pengurusekstra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengurusekstraController extends Controller
{
    public function index()
    {
        return view('pengurus_ekstra.dashboard');
    }
}
