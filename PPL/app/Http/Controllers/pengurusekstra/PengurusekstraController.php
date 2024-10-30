<?php
namespace App\Http\Controllers\Pengurusekstra;
use App\Http\Controllers\Controller;


class PengurusekstraController extends Controller
{
    public function index()
    {
        // Logic for the dashboard, e.g., fetching data or statistics for the dashboard view
        return view('pengurus_ekstra.dashboard'); // Adjust view path as needed
    }
}
