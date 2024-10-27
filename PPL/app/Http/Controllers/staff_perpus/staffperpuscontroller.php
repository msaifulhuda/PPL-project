<?php

namespace App\Http\Controllers\staff_perpus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class staffperpuscontroller extends Controller
{
    public function index()
    {
        // Logic for the dashboard, e.g., fetching data or statistics for the dashboard view
        return view('staff_perpus.dashboard'); // Adjust view path as needed
    }
}
