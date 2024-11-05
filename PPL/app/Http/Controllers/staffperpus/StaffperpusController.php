<?php

namespace App\Http\Controllers\staffperpus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffperpusController extends Controller
{
    public function index()
    {
        $transaksi_peminjaman = DB::table('transaksi_peminjaman')->get();
        dd($transaksi_peminjaman);
        return view('staff_perpus.dashboard', ['transaksi' => $transaksi_peminjaman]);
    }
}
