<?php

namespace App\Http\Controllers\guru\lms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrackingTugasGuruController extends Controller
{
    public function index()
    {
        return view('guru.lms.tracking_tugas');
    }
}
