<?php

namespace App\Http\Controllers\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
        public function index()
    {
        // Logic for the dashboard, e.g., fetching data or statistics for the dashboard view
        return view('siswa.dashboard'); // Adjust view path as needed
    }
}
