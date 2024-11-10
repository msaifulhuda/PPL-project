<?php

namespace App\Http\Controllers\staffperpus;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\kategori_buku;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class StaffperpusController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $transaksi_peminjaman = DB::table('transaksi_peminjaman')
            ->join('buku', 'transaksi_peminjaman.id_buku', '=', 'buku.id_buku')
            ->join('kategori_buku', 'buku.id_kategori_buku', '=', 'kategori_buku.id_kategori_buku')
            ->join('jenis_buku', 'buku.id_jenis_buku', '=', 'jenis_buku.id_jenis_buku')
            ->limit(7)
            ->get();

        $sevenDaysAgo = Carbon::now()->subDays(7)->toDateString(); // Get the date 7 days ago

        $transactionsevendays = DB::table('transaksi_peminjaman')
            ->join('buku', 'transaksi_peminjaman.id_buku', '=', 'buku.id_buku')
            ->where('transaksi_peminjaman.tgl_awal_Peminjaman', '>', $sevenDaysAgo)
            ->orderBy('transaksi_peminjaman.tgl_awal_Peminjaman', 'asc')
            ->get();

        $all = DB::table('transaksi_peminjaman')
            ->join('buku', 'transaksi_peminjaman.id_buku', '=', 'buku.id_buku')
            ->get();
        $book = DB::table('buku')
            ->get();
        $book10 = DB::table('buku')
            ->orderBy('tgl_ditambahkan', 'desc')
            ->limit(7)
            ->get();
        $cat10 = DB::table('kategori_buku')
            ->limit(7)
            ->get();
        $totalCategory = DB::table('kategori_buku')
            ->count();
        return view('staff_perpus.dashboard', ['transaksi' => $transaksi_peminjaman, 'transactionsevendays' => $transactionsevendays, 'alltrans' => $all, 'buku' => $book, 'buku10' => $book10, 'cat10' => $cat10, 'totalCategory' => $totalCategory]);
    }
    public function manageCategory()
    {
        $Category = DB::table('kategori_buku')
            ->paginate(10);
        return view('staff_perpus.kategori_buku', ['arrayCategory' => $Category]);
    }
    public function addCategory($nama_kategori)
    {
        kategori_buku::create([
            'id_kategori_buku' => Str::uuid(),
            'nama_kategori' => $nama_kategori
        ]);
    }
}
