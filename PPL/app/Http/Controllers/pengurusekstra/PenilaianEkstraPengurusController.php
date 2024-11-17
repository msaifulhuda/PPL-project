<?php

namespace App\Http\Controllers\pengurusekstra;

use App\Models\KelasSiswa;
use App\Models\tahun_ajaran;
use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use App\Http\Controllers\Controller;
use App\Models\PenilaianEkstrakurikuler;
use App\Models\RegistrasiEkstrakurikuler;
use App\Models\LaporanPenilaianEkstrakurikuler;

class PenilaianEkstraPengurusController extends Controller
{
    public function index()
    {
        $tahun_ajaran = tahun_ajaran::get();
        $tahun_ajaran_aktif = tahun_ajaran::where('aktif', '1')->firstOrFail();

        // Ambil data pengurus dari tabel pengurus_ekstra
        $pengurusEkstra = \App\Models\PengurusEkstra::with('ekstrakurikuler')
            ->where('id_siswa', auth()->guard('web-siswa')->user()->id_siswa)
            ->firstOrFail();

        $id_ekstra = $pengurusEkstra->id_ekstrakurikuler;
        $nama_ekstra = $pengurusEkstra->ekstrakurikuler->nama_ekstrakurikuler;

        // Ambil data anggota ekstrakurikuler
        $anggota = RegistrasiEkstrakurikuler::with('siswa')
            ->where('status', 'diterima')
            ->where('id_ekstrakurikuler', $id_ekstra)
            ->get();

        $anggota_aktif = [];
        foreach ($anggota as $a) {
            $siswa = KelasSiswa::with(['siswa', 'tahunajaran'])
                ->where('id_siswa', $a->id_siswa)
                ->whereHas('tahunajaran', function ($query) use ($tahun_ajaran_aktif) {
                    $query->where('tahun_ajaran', $tahun_ajaran_aktif->id_tahun_ajaran);
                })
                ->first();

            if ($siswa) {
                $anggota_aktif[] = $siswa;
            }
        }

        // Ambil data laporan dan penilaian
        $laporan = LaporanPenilaianEkstrakurikuler::where('id_ekstrakurikuler', $id_ekstra)->get();
        $penilaian = PenilaianEkstrakurikuler::whereIn('id_siswa', collect($anggota_aktif)->pluck('id_siswa'))->get();

        // Mapping data laporan dan penilaian ke anggota aktif
        $laporan_anggota = collect($anggota_aktif)->map(function ($item) use ($laporan, $penilaian) {
            $laporanItem = $laporan->firstWhere('id_siswa', $item->id_siswa);
            $penilaianItem = $penilaian->firstWhere('id_siswa', $item->id_siswa);
            $item->laporan = $laporanItem;
            $item->penilaian = $penilaianItem;
            return $item;
        });

        return view('pengurus_ekstra.laporan_nilai.index', compact('laporan_anggota', 'nama_ekstra', 'penilaian', 'tahun_ajaran_aktif', 'id_ekstra', 'tahun_ajaran'));
    }


    public function show($id)
    {
        $tahun_ajaran = tahun_ajaran::get();
        $tahun_ajaran_aktif = tahun_ajaran::where('id_tahun_ajaran', $id)->firstOrFail();

        $ekstra = Ekstrakurikuler::where('id_siswa', auth()->guard('web-siswa')->user()->id_siswa)->firstOrFail();
        $nama_ekstra = $ekstra->nama_ekstrakurikuler;
        $id_ekstra = $ekstra->id_ekstrakurikuler;
        $anggota = RegistrasiEkstrakurikuler::with('siswa')->where('status', 'diterima')->where('id_ekstrakurikuler', $id_ekstra)->get(); //array
        $anggota_aktif = [];

        foreach ($anggota as $a) {
            $siswa = KelasSiswa::with(['siswa', 'tahunajaran'])->where('id_siswa', $a->id_siswa)->whereHas('tahunajaran', function ($query) use ($tahun_ajaran_aktif)
            {$query->where('tahun_ajaran', $tahun_ajaran_aktif->id_tahun_ajaran);})
            ->first();

            array_push($anggota_aktif, $siswa);
        }

        $laporan = LaporanPenilaianEkstrakurikuler::with('siswa')->where('id_ekstrakurikuler', $id_ekstra)->get();
        $penilaian = PenilaianEkstrakurikuler::whereIn('id_siswa', collect($anggota_aktif)->pluck('id_siswa'))->get();

        if ($siswa == null) {
            $laporan_anggota = [];
            return view('pengurus_ekstra.laporan_nilai.index', compact('nama_ekstra', 'penilaian', 'tahun_ajaran_aktif', 'id_ekstra', 'tahun_ajaran', 'laporan_anggota'));
        }

        $laporan_anggota = collect($anggota_aktif)->map(function ($item) use ($laporan, $penilaian) {
            $laporanItem = $laporan->firstWhere('id_siswa', $item->id_siswa);
            $penilaianItem = $penilaian->firstWhere('id_siswa', $item->id_siswa);
            $item->laporan = $laporanItem;
            $item->penilaian = $penilaianItem;
            return $item;
        });


        return view('pengurus_ekstra.laporan_nilai.index', compact('laporan_anggota', 'nama_ekstra', 'penilaian', 'tahun_ajaran_aktif', 'id_ekstra', 'tahun_ajaran'));
    }



    public function storeOrUpdate(Request $request, $id_siswa)
    {
        $request->validate([
            'penilaian' => 'required',
            'id_siswa' => 'required',
            'id_laporan' => 'required',
        ]);

        $tahun_ajaran = tahun_ajaran::where('aktif', '1')->firstOrFail()->id_tahun_ajaran;
        $id_ekstra = Ekstrakurikuler::where('id_siswa', auth()->guard('web-siswa')->user()->id_siswa)->firstOrFail()->id_ekstrakurikuler;

        // Mencari data penilaian ekstrakurikuler berdasarkan id_siswa dan id_tahun_ajaran
        $penilaian = PenilaianEkstrakurikuler::where('id_siswa', $id_siswa)->where('id_tahun_ajaran', $tahun_ajaran)->first();
        // Jika data penilaian sudah ada, maka akan diupdate
        if($penilaian)
        {
            $penilaian->update([
                'penilaian' => $request->penilaian,
            ]);
        }

        // Jika data penilaian belum ada, maka akan disimpan
        else
        {

            $penilaian = PenilaianEkstrakurikuler::create([
                'id_siswa' => $id_siswa,
                'id_ekstrakurikuler' => $id_ekstra,
                'id_tahun_ajaran' => $tahun_ajaran->id_tahun_ajaran,
                'id_laporan' => $request->id_laporan,
                'penilaian' => $request->penilaian,
            ]);
        }

        $tgl_penilaian = PenilaianEkstrakurikuler::where('id_siswa', $id_siswa)->where('id_tahun_ajaran', $tahun_ajaran)->firstOrFail()->tgl_penilaian;
        return response()->json(['success' => true, 'tgl_penilaian' => $tgl_penilaian]);
    }

    public function updateLaporan(Request $request, $id_laporan)
    {
        $request->validate([
            'isi_laporan' => 'required|string|max:500', // Validasi isi laporan
        ]);

        $laporan = LaporanPenilaianEkstrakurikuler::findOrFail($id_laporan);

        // Update isi laporan
        $laporan->update([
            'isi_laporan' => $request->isi_laporan,
        ]);

        return redirect()->back()->with('success', 'Isi laporan berhasil diperbarui.');
    }
}
