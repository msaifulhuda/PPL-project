<?php

namespace App\Http\Controllers\staffakademik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffakademikController extends Controller
{
    public function index()
    {
        // Logic for the dashboard, e.g., fetching data or statistics for the dashboard view
        return view('staff_akademik.dashboard'); // Adjust view path as needed
    }
}
