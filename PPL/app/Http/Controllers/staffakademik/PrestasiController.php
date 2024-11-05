<?php

namespace App\Http\Controllers\staffakademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use Illuminate\Support\Str;

class PrestasiController extends Controller
{
    // Menampilkan form tambah prestasi
    public function create()
    {
        return view("staff_akademik.prestasiSiswa.create");
    }

    // Menyimpan data prestasi
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|string|max:36|exists:siswa,id_siswa',
            'id_prestasi' => 'required|string|max:255', // Kolom tambahan untuk id_prestasi
            'nama_prestasi' => 'required|string|max:255',
            'bukti_prestasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'deskripsi_prestasi' => 'required|string',
            'status_prestasi' => 'required|boolean', // Status diatur dari input
        ]);

        $buktiPrestasi = null;
        if ($request->hasFile('bukti_prestasi')) {
            $buktiPrestasi = $request->file('bukti_prestasi')->store('uploads/prestasi', 'public');
        }

        $prestasi = new Prestasi();
        $prestasi->id = Str::uuid(); // Menggunakan UUID untuk id
        $prestasi->siswa_id = $request->siswa_id;
        $prestasi->id_prestasi = $request->id_prestasi;
        $prestasi->nama_prestasi = $request->nama_prestasi;
        $prestasi->bukti_prestasi = $buktiPrestasi;
        $prestasi->deskripsi_prestasi = $request->deskripsi_prestasi;
        $prestasi->status_prestasi = $request->status_prestasi; // Menggunakan status dari input

        $prestasi->save();

        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil ditambahkan!');
    }

    // Menampilkan daftar prestasi
    public function index()
    {
        return view("staff_akademik.prestasiSiswa.index");
    }
    public function pengajuan()
    {
        // Logika untuk menampilkan halaman pengajuan
        return view('staff_akademik.prestasiSiswa.pengajuan'); // Pastikan view ini ada
    }
}
