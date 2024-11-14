<?php

namespace App\Http\Controllers\guru\lms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumGuruController extends Controller
{
    public function index()
    {
        return view('guru.lms.forum');
    }
}
