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
        $pengurusEkstra = PengurusEkstra::with('ekstrakurikuler', 'siswa')
            ->where('id_siswa', auth()->guard('web-siswa')->user()->id_siswa)
            ->first();

        $perPage = 7;
        $currentPage = $request->input('page', 1);

        $siswa = registrasi_ekstrakurikuler::with('siswa')
            ->where('id_ekstrakurikuler', $pengurusEkstra->id_ekstrakurikuler)
            ->get();

        $members = $siswa->map(function ($registrasi) {
            // Mengatur status dari registrasi pada objek siswa
            $registrasi->siswa->status = $registrasi->status;
            return $registrasi->siswa;
        });

        // Paginasi manual
        $totalItems = $members->count();
        $totalPages = (int) ceil($totalItems / $perPage);
        $paginatedMembers = $members->slice(($currentPage - 1) * $perPage, $perPage);

        return view('pengurus_ekstra.anggota.index', [
            'ekstrakurikuler' => $pengurusEkstra->ekstrakurikuler->nama_ekstrakurikuler,
            'members' => $paginatedMembers,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'totalItems' => $totalItems,
            'loggedInUsername' => $pengurusEkstra->siswa->nama_siswa,
            'perPage' => $perPage,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        // Mendapatkan informasi ekstra untuk siswa saat ini
        $pengurusEkstra = PengurusEkstra::where('id_siswa', auth()->guard('web-siswa')->user()->id_siswa)->first();

        if (!$pengurusEkstra) {
            return redirect()->route('pengurus_ekstra.anggota')->withErrors('Ekstrakurikuler tidak ditemukan untuk siswa ini.');
        }

        // Cari registrasi terkait dalam `registrasi_ekstrakurikuler` untuk siswa dan ekstrakurikuler tertentu
        $registration = registrasi_ekstrakurikuler::where('id_siswa', $id)
            ->where('id_ekstrakurikuler', $pengurusEkstra->id_ekstrakurikuler)
            ->firstOrFail();

        // Memperbarui status dari permintaan
        $registration->status = $request->input('status');
        $registration->save();

        return redirect()->route('pengurus_ekstra.anggota')->with('success', 'Status berhasil diperbarui.');
    }
}
