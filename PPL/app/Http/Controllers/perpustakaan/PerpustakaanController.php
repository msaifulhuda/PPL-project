<?php

namespace App\Http\Controllers\perpustakaan;

use App\Models\buku;
use App\Models\kategori_buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerpustakaanController extends Controller
{
    public function indexGuru(Request $request)
    {
        // Ambil data search dan kategori dari query string
        $search = $request->input('search');
        $kategori_buku = $request->input('kategori_buku');

        // Query dasar untuk mendapatkan semua buku
        $query = buku::query();

        // Filter berdasarkan pencarian (jika ada)
        if ($search) {
            $query->where('judul_buku', 'LIKE', '%' . $search . '%');
        }

        // Filter berdasarkan kategori (jika ada)
        if (!empty($kategori_buku)) {
            $query->where('id_kategori_buku', '=', $kategori_buku);
        }

        // Dapatkan hasil dengan simple paginasi
        $pages = $query->simplePaginate(12); // Menggunakan simplePaginate
        $categories = kategori_buku::all();

        // Kirim data buku ke view perpustakaan.index
        return view('guru.perpustakaan.index', compact('pages', 'categories'));
    }





    public function indexSiswa(Request $request)
    {
        // Ambil data search dan kategori dari query string
        $search = $request->input('search');
        $kategori_buku = $request->input('kategori_buku');

        // Query dasar untuk mendapatkan semua buku
        $query = buku::query();

        // Filter berdasarkan pencarian (jika ada)
        if ($search) {
            $query->where('judul_buku', 'LIKE', '%' . $search . '%');
        }

        // Filter berdasarkan kategori (jika ada)
        if (!empty($kategori_buku)) {
            $query->where('id_kategori_buku', '=', $kategori_buku);
        }

        // Dapatkan hasil dengan simple paginasi
        $pages = $query->simplePaginate(12); // Menggunakan simplePaginate
        $categories = kategori_buku::all();

        // Kirim data buku ke view perpustakaan.index
        return view('siswa.perpustakaan.index', compact('pages', 'categories'));
    }

}
