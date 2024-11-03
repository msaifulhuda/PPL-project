<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class PerpustakaanController extends Controller
{
    public function index()
    {
        return view('perpustakaan.index');

    }
}
