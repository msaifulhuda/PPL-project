<?php

namespace App\Http\Controllers\staffakademik;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StaffakademikController extends Controller
{
    public function index()
    {
        // Logic for the dashboard, e.g., fetching data or statistics for the dashboard view
        return view('staff_akademik.dashboard'); // Adjust view path as needed
    }

    /**
     * START JADWAL MANAGEMENT
     */

    //  read jadwal
    public function jadwalIndex()
    {
        $kelas = DB::table('kelas')->get();
        $data = DB::table('kelas_mata_pelajaran')
        ->join('kelas', 'kelas_mata_pelajaran.kelas_id', '=', 'kelas.id_kelas')
        ->join('mata_pelajaran', 'kelas_mata_pelajaran.mata_pelajaran_id', '=', 'mata_pelajaran.id_matpel')
        ->join('guru', 'kelas_mata_pelajaran.guru_id', '=', 'guru.id_guru')
        ->join('hari', 'kelas_mata_pelajaran.hari_id', '=', 'hari.id_hari')
        ->join('tahun_ajaran', 'kelas_mata_pelajaran.tahun_ajaran_id', '=', 'tahun_ajaran.id_tahun_ajaran')
        ->select(
            'kelas_mata_pelajaran.id_kelas_mata_pelajaran',
            'kelas_mata_pelajaran.kelas_id',
            'kelas.nama_kelas',
            'kelas_mata_pelajaran.mata_pelajaran_id',
            'mata_pelajaran.nama_matpel',
            'kelas_mata_pelajaran.guru_id',
            'guru.nip',
            'guru.nama_guru',
            'kelas_mata_pelajaran.hari_id',
            'hari.nama_hari',
            'kelas_mata_pelajaran.waktu_mulai',
            'kelas_mata_pelajaran.waktu_selesai',
            'kelas_mata_pelajaran.tahun_ajaran_id',
            'tahun_ajaran.tahun_mulai',
            'tahun_ajaran.tahun_selesai',
            'tahun_ajaran.semester',
            'tahun_ajaran.aktif'
        )
        ->where('tahun_ajaran.aktif', 1) // Kondisi where
        ->orderBy('hari.id_hari') // Urutkan berdasarkan hari
        ->orderBy('kelas_mata_pelajaran.waktu_mulai') // Urutkan berdasarkan waktu mulai
        ->get();

        return view('staff_akademik.jadwalManagemen.index', compact('data', 'kelas'));
    }

    // tambah jadwal
    public function createJadwal()
    {
        $tahunAjaran = DB::table('tahun_ajaran')->where('aktif', 1)->first();
        $kelas = DB::table('kelas')->get();
        $hari = DB::table('hari')->get();
        $guruMataPelajaran = DB::table('guru_mata_pelajaran')
            ->join('guru', 'guru_mata_pelajaran.guru_id', '=', 'guru.id_guru')
            ->join('mata_pelajaran', 'guru_mata_pelajaran.matpel_id', '=', 'mata_pelajaran.id_matpel')
            ->select('guru.id_guru', 'guru.nama_guru', 'mata_pelajaran.id_matpel', 'mata_pelajaran.nama_matpel')
            ->get();
        // dd($guruMataPelajaran);
        return view('staff_akademik.jadwalManagemen.create', compact('kelas', 'hari', 'guruMataPelajaran', 'tahunAjaran'));
    }

    public function storeJadwal(Request $request)
    {
        $jadwalData = $request->input('jadwal');
        foreach ($jadwalData as $jadwal) {
            $guruid_matpelid = explode('_', $jadwal['guru_id']);
            DB::table('kelas_mata_pelajaran')->insert([
                'id_kelas_mata_pelajaran' => (string) Str::uuid(),
                'kelas_id' => $request->input('kelas_id'),
                'hari_id' => $jadwal['hari_id'],
                'waktu_mulai' => $jadwal['waktu_mulai'],
                'waktu_selesai' => $jadwal['waktu_selesai'],
                'guru_id' => $guruid_matpelid[0],
                'mata_pelajaran_id' => $guruid_matpelid[1],
                'tahun_ajaran_id' => $request->input('tahun_ajaran_id'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('staff_akademik.jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * END JADWAL MANAGEMENT
     */
}
