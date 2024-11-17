<?php

namespace App\Http\Controllers\staffperpus;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\kategori_buku;
use App\Models\transaksi_peminjaman;


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

    public function daftarbuku(Request $request)
    {

        // Ambil data search dan kategori dari query string
        $search = $request->input('search');
        $kategori_buku = $request->input('kategori_buku');

        $query = buku::query();

        // Filter berdasarkan pencarian (jika ada)
        if ($search) {
            $query->where('judul_buku', 'LIKE', '%' . $search . '%');
        }

        // Filter berdasarkan kategori (jika ada)
        if (!empty($kategori_buku)) {
            $query->where('id_kategori_buku', '=', $kategori_buku);
        }

        // Dapatkan hasil dengan paginasi
        $buku = $query->orderBy('tgl_ditambahkan', 'desc')->paginate(12);
        $kategoriBuku = kategori_buku::all();

        return view('staff_perpus.buku.daftarbuku', compact('buku', 'kategoriBuku'));
    }

    // Menampilkan form tambah buku
    public function createbuku()
    {
        $kategoriBuku = DB::table('kategori_buku')->get();
        $jenisBuku = DB::table('jenis_buku')->get(); // Jika juga perlu jenis buku

        return view('staff_perpus.buku.create', compact('kategoriBuku', 'jenisBuku'));
    }

    // Menyimpan buku baru
    public function storebuku(Request $request)
    {
        $request->validate([
            'foto_buku' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul_buku' => [
        'required',
        'string',
        'max:255',
        function ($attribute, $value, $fail) use ($request) {
            if (buku::where('judul_buku', $value)
                ->where('id_buku', '!=', $request) // Mengecualikan buku yang sedang diedit
                ->exists()) {
                $fail('Judul buku yang sama sudah ada di database.');
            }
        },
        ],
            'author_buku' => 'required|string|max:255',
            'rak_buku' => 'required|integer|min:0',
            'id_kategori_buku' => 'required|exists:kategori_buku,id_kategori_buku',
            'id_jenis_buku' => 'required|exists:jenis_buku,id_jenis_buku',
            'stok_buku' => 'required|integer|min:0',
            'tahun_terbit' => 'required|string|max:4',
            'bahasa_buku' => 'required|string|max:255',
            'publisher_buku' => 'required|string|max:255',
            'harga_buku' => 'required|numeric|min:0', // Validasi harga buku
        ], [
            'foto_buku.required' => 'Foto buku harus diisi.',
            'foto_buku.image' => 'File foto buku harus berupa gambar.',
        'foto_buku.mimes' => 'Foto buku harus memiliki format jpeg, png, jpg, gif, atau svg.',
        'foto_buku.max' => 'Foto buku tidak boleh lebih dari 2MB.',
        
        'judul_buku.required' => 'Judul buku harus diisi.',
        'judul_buku.string' => 'Judul buku harus berupa teks.',
        'judul_buku.max' => 'Judul buku tidak boleh lebih dari 255 karakter.',
        
        'author_buku.required' => 'Penulis buku harus diisi.',
        'author_buku.string' => 'Penulis buku harus berupa teks.',
        'author_buku.max' => 'Nama penulis buku tidak boleh lebih dari 255 karakter.',
        
        'rak_buku.required' => 'Rak buku harus diisi.',
        'rak_buku.integer' => 'Rak buku harus berupa angka.',
        'rak_buku.min' => 'Rak buku tidak boleh kurang dari 0.',
        
        'id_kategori_buku.required' => 'Kategori buku harus dipilih.',
        'id_kategori_buku.exists' => 'Kategori buku yang dipilih tidak valid.',
        
        'id_jenis_buku.required' => 'Jenis buku harus dipilih.',
        'id_jenis_buku.exists' => 'Jenis buku yang dipilih tidak valid.',
        
        'stok_buku.required' => 'Stok buku harus diisi.',
        'stok_buku.integer' => 'Stok buku harus berupa angka.',
        'stok_buku.min' => 'Stok buku tidak boleh kurang dari 0.',
        
        'tahun_terbit.required' => 'Tahun terbit buku harus diisi.',
        'tahun_terbit.string' => 'Tahun terbit buku harus berupa teks.',
        'tahun_terbit.max' => 'Tahun terbit buku tidak boleh lebih dari 4 karakter.',
        
        'bahasa_buku.required' => 'Bahasa buku harus diisi.',
        'bahasa_buku.string' => 'Bahasa buku harus berupa teks.',
        'bahasa_buku.max' => 'Bahasa buku tidak boleh lebih dari 255 karakter.',
        
        'publisher_buku.required' => 'Penerbit buku harus diisi.',
        'publisher_buku.string' => 'Penerbit buku harus berupa teks.',
        'publisher_buku.max' => 'Penerbit buku tidak boleh lebih dari 255 karakter.',
        
        'harga_buku.required' => 'Harga buku harus diisi.',
        'harga_buku.numeric' => 'Harga buku harus berupa angka.',
        'harga_buku.min' => 'Harga buku tidak boleh kurang dari 0.',
    ]);

        if ($request->hasFile('foto_buku')) {
            // Ambil file dari request
            $file = $request->file('foto_buku');
            
            // Buat nama file baru dengan menambahkan timestamp
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Simpan file menggunakan Storage ke folder public/images/Perpustakaan
            Storage::disk('public')->put('images/Perpustakaan/' . $filename, file_get_contents($file));
        }

        buku::create([
            'foto_buku' => 'storage/images/Perpustakaan/' . $filename,
            'judul_buku' => $request->judul_buku,
            'author_buku' => $request->author_buku,
            'rak_buku' => $request->rak_buku,
            'id_kategori_buku' => $request->id_kategori_buku,
            'id_jenis_buku' => $request->id_jenis_buku,
            'stok_buku' => $request->stok_buku,
            'tahun_terbit' => $request->tahun_terbit,
            'bahasa_buku' => $request->bahasa_buku,
            'publisher_buku' => $request->publisher_buku,
            'harga_buku' => $request->harga_buku, // Menyimpan harga buku
            'tgl_ditambahkan' => now(),
        ]);

        return redirect()->route('staff_perpus.buku.daftarbuku')->with('success', 'Buku berhasil ditambahkan!');
    }    


    public function editbuku($id)
    {
        $buku = buku::findOrFail($id);
        $kategoriBuku = DB::table('kategori_buku')->get();
        $jenisBuku = DB::table('jenis_buku')->get();

        return view('staff_perpus.buku.edit', compact('buku', 'kategoriBuku', 'jenisBuku'));
    }

public function updatebuku(Request $request, $id)
{
    $request->validate([
        'foto_buku' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'judul_buku' => [
        'required',
        'string',
        'max:255',
        function ($attribute, $value, $fail) use ($id) {
            if (buku::where('judul_buku', $value)
                ->where('id_buku', '!=', $id) // Mengecualikan buku yang sedang diedit
                ->exists()) {
                $fail('Judul buku yang sama sudah ada di database.');
            }
        },
        ],
        'author_buku' => 'required|string|max:255',
        'rak_buku' => 'required|integer|min:0',
        'id_kategori_buku' => 'required|exists:kategori_buku,id_kategori_buku',
        'id_jenis_buku' => 'required|exists:jenis_buku,id_jenis_buku',
        'stok_buku' => 'required|integer|min:0',
        'tahun_terbit' => 'required|string|max:4',
        'bahasa_buku' => 'required|string|max:255',
        'publisher_buku' => 'required|string|max:255',
        'harga_buku' => 'required|numeric|min:0', // Validasi harga buku
    ], [
        'foto_buku.required' => 'Foto buku harus diisi.',
        'foto_buku.image' => 'File foto buku harus berupa gambar.',
    'foto_buku.mimes' => 'Foto buku harus memiliki format jpeg, png, jpg, gif, atau svg.',
    'foto_buku.max' => 'Foto buku tidak boleh lebih dari 2MB.',
    
    'judul_buku.required' => 'Judul buku harus diisi.',
    'judul_buku.string' => 'Judul buku harus berupa teks.',
    'judul_buku.max' => 'Judul buku tidak boleh lebih dari 255 karakter.',
    
    'author_buku.required' => 'Penulis buku harus diisi.',
    'author_buku.string' => 'Penulis buku harus berupa teks.',
    'author_buku.max' => 'Nama penulis buku tidak boleh lebih dari 255 karakter.',
    
    'rak_buku.required' => 'Rak buku harus diisi.',
    'rak_buku.integer' => 'Rak buku harus berupa angka.',
    'rak_buku.min' => 'Rak buku tidak boleh kurang dari 0.',
    
    'id_kategori_buku.required' => 'Kategori buku harus dipilih.',
    'id_kategori_buku.exists' => 'Kategori buku yang dipilih tidak valid.',
    
    'id_jenis_buku.required' => 'Jenis buku harus dipilih.',
    'id_jenis_buku.exists' => 'Jenis buku yang dipilih tidak valid.',
    
    'stok_buku.required' => 'Stok buku harus diisi.',
    'stok_buku.integer' => 'Stok buku harus berupa angka.',
    'stok_buku.min' => 'Stok buku tidak boleh kurang dari 0.',
    
    'tahun_terbit.required' => 'Tahun terbit buku harus diisi.',
    'tahun_terbit.string' => 'Tahun terbit buku harus berupa teks.',
    'tahun_terbit.max' => 'Tahun terbit buku tidak boleh lebih dari 4 karakter.',
    
    'bahasa_buku.required' => 'Bahasa buku harus diisi.',
    'bahasa_buku.string' => 'Bahasa buku harus berupa teks.',
    'bahasa_buku.max' => 'Bahasa buku tidak boleh lebih dari 255 karakter.',
    
    'publisher_buku.required' => 'Penerbit buku harus diisi.',
    'publisher_buku.string' => 'Penerbit buku harus berupa teks.',
    'publisher_buku.max' => 'Penerbit buku tidak boleh lebih dari 255 karakter.',
    
    'harga_buku.required' => 'Harga buku harus diisi.',
    'harga_buku.numeric' => 'Harga buku harus berupa angka.',
    'harga_buku.min' => 'Harga buku tidak boleh kurang dari 0.',
]);

        $buku = buku::findOrFail($id);
        if ($request->hasFile('foto_buku')) {
            if ($buku->foto_buku) {
                Storage::delete($buku->foto_buku);
            }
            $buku->foto_buku = $request->file('foto_buku')->store('public/buku');
        }

    $buku->update([
        'judul_buku' => $request->judul_buku,
        'author_buku' => $request->author_buku,
        'rak_buku' => $request->rak_buku,
        'id_kategori_buku' => $request->id_kategori_buku,
        'id_jenis_buku' => $request->id_jenis_buku,
        'stok_buku' => $request->stok_buku,
        'tahun_terbit' => $request->tahun_terbit,
        'bahasa_buku' => $request->bahasa_buku,
        'publisher_buku' => $request->publisher_buku,
        'harga_buku' => $request->harga_buku, // Menyimpan harga buku
    ]);

        return redirect()->route('staff_perpus.buku.daftarbuku')->with('success', 'Buku berhasil diperbarui!');
    }


    public function destroybuku($id)
    {
        $buku = buku::findOrFail($id);
        if ($buku->foto_buku) {
            Storage::delete($buku->foto_buku);
        }
        $buku->delete();

    return redirect()->route('staff_perpus.buku.daftarbuku')->with('success', 'Buku berhasil dihapus!');
}


public function back(Request $request)
{
    // Mengambil nilai query dari request
    $query = $request->input('query');

    // Mengambil transaksi dengan filter status_pengembalian != 1
    $transactions = transaksi_peminjaman::where('status_pengembalian', '!=', '1') // Filter untuk status_pengembalian
        ->when($query, function ($queryBuilder) use ($query) {
            // Jika ada query, tambahkan filter untuk kode_peminjam
            return $queryBuilder->where('kode_peminjam', 'like', '%' . $query . '%');
        })
        ->orderBy('tgl_pengembalian', 'asc')
        ->simplePaginate(10);

    // Mengembalikan hasil ke view
    return view('staff_perpus.pengembalian.index', compact('transactions', 'query'));
}


public function show($id)
{
    $buku = Buku::with('kategoriBuku', 'jenisBuku')->findOrFail($id);

    return view('staff_perpus.buku.detail', compact('buku'));
}

}
