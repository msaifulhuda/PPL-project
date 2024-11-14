<?php

namespace App\Http\Controllers\pembinaekstra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use App\Models\RegistrasiEkstrakurikuler;

class PembinaAnggotaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data pembina ekstra berdasarkan guru yang sedang login
        $pembinaEkstra = Ekstrakurikuler::with('pembinaEkstra')
            ->where('guru_id', auth()->guard('web-guru')->user()->id_guru)
            ->first();

        if (!$pembinaEkstra) {
            return redirect()->route('pembina_ekstra.dashboard')->withErrors('Ekstrakurikuler tidak ditemukan untuk pembina ini.');
        }

        $perPage = 7;
        $currentPage = $request->input('page', 1);

        // Ambil anggota ekstrakurikuler berdasarkan `id_ekstrakurikuler` dari pembina
        $siswa = RegistrasiEkstrakurikuler::with('siswa')
            ->where('id_ekstrakurikuler', $pembinaEkstra->id_ekstrakurikuler)
            ->get();

        // Map data siswa dan tambahkan status dari registrasi ekstrakurikuler
        $members = $siswa->map(function ($registrasi) {
            return (object) [
                'name' => $registrasi->siswa->nama_siswa,
                'nisn' => $registrasi->siswa->nisn,
                'address' => $registrasi->siswa->alamat_siswa,
                'status' => $registrasi->status,
            ];
        });

        // Paginasi manual
        $totalItems = $members->count();
        $totalPages = (int) ceil($totalItems / $perPage);
        $paginatedMembers = $members->slice(($currentPage - 1) * $perPage, $perPage);

        return view('pembina_ekstra.anggota.index', [
            'ekstrakurikuler' => $pembinaEkstra->nama_ekstrakurikuler,
            'members' => $paginatedMembers,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'totalItems' => $totalItems,
            'loggedInUsername' => auth()->guard('web-guru')->user()->username,
            'perPage' => $perPage,
        ]);
    }
}
