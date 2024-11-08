<?php

namespace App\Http\Controllers\StaffAkademik;

use App\Http\Controllers\Controller;
use App\Models\Guru_mata_pelajaran;
use App\Models\Mata_pelajaran;
use App\Models\kelas;
use App\Models\Guru; // Pastikan ini sudah diimport sesuai nama model yang benar
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
{
    // Logika untuk menampilkan daftar mata pelajaran
    $search = $request->input('search');
    $mataPelajaran = mata_pelajaran::when($search, function ($query, $search) {
        return $query->where('nama_matpel', 'like', '%' . $search . '%');
    })->paginate(5);

    return view('staff_akademik.matpel.master_matpel', compact('mataPelajaran', 'search'));
}

public function store(Request $request)
{
    $request->validate([
        'nama_matpel' => 'required|string|max:255',
        'deskripsi_matpel' => 'nullable|string',
    ]);

    mata_pelajaran::create($request->only('nama_matpel', 'deskripsi_matpel'));

    return redirect()->route('staff_akademik.mata-pelajaran.index')->with('success', 'Mata pelajaran berhasil ditambahkan.');
}

public function edit($id)
{
    $mataPelajaran = mata_pelajaran::findOrFail($id);
    return view('staff_akademik.matpel.edit_matpel', compact('mataPelajaran'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_matpel' => 'required|string|max:255',
        'deskripsi_matpel' => 'nullable|string',
    ]);

    $mataPelajaran = mata_pelajaran::findOrFail($id);
    $mataPelajaran->update($request->only('nama_matpel', 'deskripsi_matpel'));

    return redirect()->route('staff_akademik.mata-pelajaran.index')->with('update', 'Mata pelajaran berhasil diperbarui.');
}

public function destroy($id)
{
    $mataPelajaran = mata_pelajaran::findOrFail($id);
    $mataPelajaran->delete();

    return redirect()->route('staff_akademik.mata-pelajaran.index')->with('danger', 'Mata pelajaran berhasil dihapus.');
}


    // CRUD Kelas
    public function indexKelas(Request $request)
    {
        // Logika untuk menampilkan daftar kelas
        $search = $request->input('search');
        $kelas = kelas::when($search, function ($query, $search) {
            return $query->where('nama_kelas', 'like', '%' . $search . '%');
        })->paginate(5);

        return view('staff_akademik.matpel.master_kelas', compact('kelas', 'search'));
    }

    public function storeKelas(Request $request)
{
    $request->validate([
        'nama_kelas' => 'required|string|max:255',
    ]);

    kelas::create($request->only('nama_kelas'));

    return redirect()->route('staff_akademik.kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
}

    public function editKelas($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('staff_akademik.kelas.edit_kelas', compact('kelas'));
    }

    public function updateKelas(Request $request, $id)
{
    $request->validate([
        'nama_kelas' => 'required|string|max:255',
    ]);

    $kelas = kelas::findOrFail($id);
    $kelas->update($request->only('nama_kelas'));

    return redirect()->route('staff_akademik.kelas.index')->with('success', 'Kelas berhasil diperbarui.');
}

    public function destroyKelas($id)
    {
        $kelas = kelas::findOrFail($id);
        $kelas->delete();

    return redirect()->route('staff_akademik.kelas.index')->with('danger', 'Kelas berhasil dihapus.');
    }


     // Method untuk menampilkan daftar Guru Mata Pelajaran
     public function indexGuruMataPelajaran(Request $request)
    {
        // Ambil semua data guru mata pelajaran dengan relasi
        $query = guru_mata_pelajaran::with(['guru', 'mataPelajaran']);
        
        // Jika ada parameter pencarian, filter berdasarkan nama guru atau nama mata pelajaran
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('guru', function($q) use ($search) {
                $q->where('nama_guru', 'like', '%' . $search . '%');
            })->orWhereHas('mataPelajaran', function($q) use ($search) {
                $q->where('nama_matpel', 'like', '%' . $search . '%');
            });
    }

    // Paginate hasil query
    $guruMataPelajaran = $query->paginate(5);
    $gurus = Guru::all(); 
    $mataPelajaran = mata_pelajaran::all(); 

    return view('staff_akademik.matpel.master_guru', compact('guruMataPelajaran', 'gurus', 'mataPelajaran'));
}
     
 
     // Method untuk menampilkan form tambah Guru Mata Pelajaran
     public function createGuruMataPelajaran()
     {
         $gurus = Guru::all(); // Ambil semua data guru
         $mataPelajaran = guru_mata_pelajaran::all(); // Ambil semua data mata pelajaran
         return view('staff_akademik.guru_mata_pelajaran.create', compact('gurus', 'mataPelajaran'));
     }
 
     // Method untuk menyimpan data Guru Mata Pelajaran
     public function storeGuruMataPelajaran(Request $request)
        {
            $request->validate([
                'guru_id' => 'required|exists:guru,id_guru',
                'matpel_id' => 'required|exists:mata_pelajaran,id_matpel',
            ]);

            guru_mata_pelajaran::create([
                'guru_id' => $request->guru_id,
                'matpel_id' => $request->matpel_id,
            ]);

            return redirect()->route('staff_akademik.guru_mata_pelajaran.index')
                            ->with('success', 'Penugasan guru ke mata pelajaran berhasil ditambahkan.');
        }
 
     // Method untuk menampilkan form edit Guru Mata Pelajaran
     public function editGuruMataPelajaran($id)
     {
         $penugasan = guru_mata_pelajaran::findOrFail($id);
         $gurus = Guru::all(); // Ambil semua data guru
         $mataPelajaran = guru_mata_pelajaran::all(); // Ambil semua data mata pelajaran
 
         return view('staff_akademik.guru_mata_pelajaran.edit', compact('penugasan', 'gurus', 'mataPelajaran'));
     }
 
     // Method untuk memperbarui data Guru Mata Pelajaran
     public function updateGuruMataPelajaran(Request $request, $id)
     {
         $request->validate([
             'guru_id' => 'required|exists:guru,id_guru',
             'matpel_id' => 'required|exists:mata_pelajaran,id_matpel',
         ]);
     
         $penugasan = guru_mata_pelajaran::findOrFail($id);
         $penugasan->update([
             'guru_id' => $request->guru_id,
             'matpel_id' => $request->matpel_id,
         ]);
     
         return redirect()->route('staff_akademik.guru_mata_pelajaran.index')
                          ->with('update', 'Penugasan guru ke mata pelajaran berhasil diperbarui.');
     }
     
     public function destroyGuruMataPelajaran($id)
     {
         $penugasan = guru_mata_pelajaran::findOrFail($id);
         $penugasan->delete();
     
         return redirect()->route('staff_akademik.guru_mata_pelajaran.index')
                          ->with('danger', 'Penugasan guru ke mata pelajaran berhasil dihapus.');
     }


     //sidebar
     public function showMasterGuru()
    {
        return view('staff_akademik.matpel.master_guru');
    }

    public function showMasterKelas()
    {
        return view('staff_akademik.matpel.master_kelas');
    }

    public function showMasterMatpel()
    {
        return view('staff_akademik.matpel.master_matpel');
    }

}

