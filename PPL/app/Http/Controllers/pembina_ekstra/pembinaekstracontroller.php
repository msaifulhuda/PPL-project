<?php

namespace App\Http\Controllers\pembina_ekstra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pembinaekstracontroller extends Controller
{
    public function index()
    {
        // Logic for the dashboard, e.g., fetching data or statistics for the dashboard view
        return view('pembina_ekstra.dashboard'); // Adjust view path as needed
    }
}
