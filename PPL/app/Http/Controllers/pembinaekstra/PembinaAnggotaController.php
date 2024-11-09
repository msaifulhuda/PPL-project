<?php

namespace App\Http\Controllers\pembinaekstra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

class PembinaAnggotaController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 7; // Jumlah item per halaman
        $currentPage = $request->input('page', 1); // Halaman saat ini

        // Query data anggota
        $query = Siswa::select('nama_siswa as name', 'nisn', 'alamat_siswa as address')
                        ->where('role_siswa', 'siswa');

        $totalItems = $query->count(); // Total jumlah item
        $totalPages = (int) ceil($totalItems / $perPage); // Total halaman
        $members = $query->skip(($currentPage - 1) * $perPage)->take($perPage)->get();

        // Username pengguna yang sedang login
        $loggedInUsername = Auth::check() ? Auth::user()->username : 'Anonymous';

        return view('pembina_ekstra.anggota.index', [
            'members' => $members,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'totalItems' => $totalItems,
            'loggedInUsername' => $loggedInUsername,
            'perPage' => $perPage, // Kirim $perPage ke view
        ]);
    }

    // Metode untuk memperbarui status anggota
    public function updateStatus(Request $request, $id)
    {
        $member = Siswa::findOrFail($id); // Temukan anggota berdasarkan ID
        $member->status = $request->input('status'); // Perbarui status
        $member->save(); // Simpan perubahan ke database

        return redirect()->route('pengurus_ekstra.anggota')->with('success', 'Status berhasil diperbarui.');
    }
}
