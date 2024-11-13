<?php

namespace App\Http\Controllers\pengurusekstra;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\PengurusEkstra;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\registrasi_ekstrakurikuler;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $pengurusEkstra = PengurusEkstra::with('ekstrakurikuler', 'siswa')->where('id_siswa', auth()->guard('web-siswa')->user()->id_siswa)->get()->first();
        $perPage = 7; // Jumlah item per halaman
        $currentPage = $request->input('page', 1); // Halaman saat ini

        $siswa = registrasi_ekstrakurikuler::with('siswa')->where('id_ekstrakurikuler', $pengurusEkstra->id_ekstrakurikuler)->get();
        $query = $siswa->pluck('siswa');

        $totalItems = $query->count(); // Total jumlah item
        $totalPages = (int) ceil($totalItems / $perPage); // Total halaman
        $members = $query->skip(($currentPage - 1) * $perPage)->take($perPage)->all();

        return view('pengurus_ekstra.anggota.index', [
            'ekstrakurikuler' => $pengurusEkstra->ekstrakurikuler->nama_ekstrakurikuler,
            'members' => $members,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'totalItems' => $totalItems,
            'loggedInUsername' => $pengurusEkstra->siswa->nama_siswa,
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
