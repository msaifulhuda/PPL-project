<?php

namespace App\Http\Controllers\Ekstrakurikuler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    // Fungsi untuk menampilkan form registrasi
    public function showForm()
    {
        return view('ekstrakurikuler.registrasi'); // Pastikan Anda memiliki file view ini
    }

    // Fungsi untuk mengolah data yang dikirim dari form regis
    public function submitForm(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|max:10',
            'kelas' => 'required|string|max:10',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'riwayat_penyakit' => 'nullable|string',
            'no_hp_orangtua' => 'required|string|max:15',
            'alasan_ekskul' => 'required|string',
            'pilih_ekskul' => 'required|array|max:3', // Maksimal 3 pilihan
        ]);

        // Proses data form sesuai kebutuhan, misalnya menyimpan ke database

        return redirect()->route('ekstrakurikuler.registrasi')->with('success', 'Pendaftaran berhasil!');
    }
}