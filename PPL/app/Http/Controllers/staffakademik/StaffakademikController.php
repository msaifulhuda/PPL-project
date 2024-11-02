<?php

namespace App\Http\Controllers\staffakademik;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class StaffakademikController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('staff_akademik.master_kelas', compact('kelas'));
    }

    public function store(Request $request)
    {
        Kelas::create($request->all());
        return redirect()->route('staffakademik.kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->only(['nama_kelas']));
        return redirect()->route('staffakademik.kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('staffakademik.kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }

    public function cari(Request $request)
    {
        $query = $request->input('search'); // Ambil input pencarian

        // Jika ada input pencarian, filter hasilnya
        if ($query) {
            $kelas = Kelas::where('nama_kelas', 'LIKE', "%{$query}%")->paginate(10); // Ganti 10 dengan jumlah item per halaman
        } else {
            $kelas = Kelas::paginate(5); // Ambil semua data jika tidak ada pencarian
        }

        $noDataMessage = $kelas->isEmpty() ? 'Data yang dicari tidak ada.' : '';

        return view('staff_akademik.master_kelas', compact('kelas', 'noDataMessage'));
    }

}
