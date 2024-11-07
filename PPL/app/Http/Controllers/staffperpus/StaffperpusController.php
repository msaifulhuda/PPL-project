<?php

namespace App\Http\Controllers\staffperpus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffperpusController extends Controller
{
    public function index()
    {
        $transaksi_peminjaman = DB::table('transaksi_peminjaman')
            ->join('buku', 'transaksi_peminjaman.id_buku', '=', 'buku.id_buku')
            ->join('kategori_buku', 'buku.id_kategori_buku', '=', 'kategori_buku.id_kategori_buku')
            ->join('jenis_buku', 'buku.id_jenis_buku', '=', 'jenis_buku.id_jenis_buku')
            // ->where('transaksi_peminjaman.tgl_awal_Peminjaman', '<', 'DATE_SUB(CURDATE(), INTERVAL 7 DAY)')
            ->get();
        return view('staff_perpus.dashboard', ['transaksi' => $transaksi_peminjaman]);
    }
}
