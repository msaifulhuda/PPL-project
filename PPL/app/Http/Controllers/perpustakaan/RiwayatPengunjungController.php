<?php

namespace App\Http\Controllers\perpustakaan;

use App\Models\buku;
use App\Models\transaksi_peminjaman;
use App\Models\guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function PHPUnit\Framework\isEmpty;

class RiwayatPengunjungController extends Controller
{

    
    public function transGuru(Request $request)
    {

        $nip = session('nip');  // Mengambil NIP dari akun yang sedang login

        // Mendapatkan transaksi berdasarkan NIP guru yang login
        $query = transaksi_peminjaman::where('kode_peminjam', '=', $nip)
                          ->join('buku', 'buku.id_buku', '=', 'transaksi_peminjaman.id_buku');

        // Jika ada pencarian berdasarkan judul buku
        if ($request->has('search')) {
            $searchTerm = $request->get('search');
            $query->where('buku.judul_buku', 'like', "%$searchTerm%");
        }

        // Mengambil data transaksi yang telah difilter dan diurutkan
        $transaksis = $query->orderByRaw('status_pengembalian != 1 DESC')  // Transaksi dengan status != 1 di atas
                            ->orderBy('tgl_pengembalian', 'desc')  // Urutkan berdasarkan tanggal transaksi
                            ->get(['transaksi_peminjaman.*', 'buku.judul_buku']);

        return view('guru.perpustakaan.riwayat', compact('transaksis'));
    }
}