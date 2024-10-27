<?php

namespace App\Http\Controllers\staff_akademik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class staffakademikcontroller extends Controller
{
    public function index()
    {
        // Logic for the dashboard, e.g., fetching data or statistics for the dashboard view
        return view('staff_akademik.dashboard'); // Adjust view path as needed
    }
}
