<?php

namespace App\Http\Controllers\perpustakaan;
use App\Models\buku;
use App\Models\kategori_buku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class PerpustakaanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data search dan katrgori dari query string
        $search = $request->input('search');
        $kategori_buku = $request->input('kategori_buku');

        // Query dasar untuk mendapatkan semua buku
        $query = buku::query();

        // Filter berdasarkan pencarian (jika ada)
        if ($search) {
            $query->where('judul_buku', 'LIKE', '%' . $search . '%');
        }

        // Filter berdasarkan kategori (jika ada)
        if ($kategori_buku) {
            $query->where('kategori_buku', $kategori_buku);
        }

        // Dapatkan hasil dengan paginasi
        $pages = $query->paginate(10);
        $categories = kategori_buku::all();

        // Kirim data buku ke view perpustakaan.index
        return view('perpustakaan.index', compact('pages', 'categories'));
    }
    public function show($id){
        $buku = buku::findOrFail($id);
        $kategori = $buku->kategori_buku;
        return view('perpustakaan.detail', compact('buku', 'kategori'));
    }
}
