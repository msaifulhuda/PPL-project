<?php

namespace App\Http\Controllers\siswa;

use App\Models\KelasSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kelas_mata_pelajaran;

class NotifikasiController extends Controller
{


    public function index()
    {
        $siswaId = auth()->guard('web-siswa')->id();
        $kelasSiswa = KelasSiswa::where('id_siswa', $siswaId)->get();
        $materi = [];

        if ($kelasSiswa) {
            foreach ($kelasSiswa as $kelas) {
            $mataPelajaran = kelas_mata_pelajaran::where('kelas_id', $kelas->id_kelas)->with('materi')->get();
            foreach ($mataPelajaran as $mapel) {
                foreach ($mapel->materi as $materiItem) {
                $materi[] = $materiItem;
                }
            }
            }
        }



        return view('siswa.notifikasi', compact('materi'));
    }
}
