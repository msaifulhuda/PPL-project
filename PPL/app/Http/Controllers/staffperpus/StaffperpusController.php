<?php

namespace App\Http\Controllers\staffperpus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffperpusController extends Controller
{
    public function index()
    {
        // Logic for the dashboard, e.g., fetching data or statistics for the dashboard view
        return view('staff_perpus.dashboard'); // Adjust view path as needed
    }
}
