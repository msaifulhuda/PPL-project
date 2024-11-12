<?php

namespace App\Http\Controllers\guru;

use App\Models\materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kelas_mata_pelajaran;
use App\Models\topik;
use App\Models\file_materi;

class GuruLmsController extends Controller
{
    public function index()
    {
        return view('guru.lms.index');
    }

    public function materi()
    {
        $data['kelas_mata_pelajaran'] = kelas_mata_pelajaran::with('kelas', 'mata_pelajaran')->where('guru_id', auth()->guard(name: 'web-guru')->user()->id_guru)->WhereHas('tahun_ajaran', fn($query) => $query->where('aktif', 1))->get();
        $data['materi'] = materi::whereIn('kelas_mata_pelajaran_id', $data['kelas_mata_pelajaran']->pluck('id_kelas_mata_pelajaran'))->where('status', 1)->get();
        $data['materi_baru'] = materi::whereIn('kelas_mata_pelajaran_id', $data['kelas_mata_pelajaran']->pluck('id_kelas_mata_pelajaran'))->orderBy('created_at', 'desc')->get();
        $data['materi_baru_date'] = $data['materi_baru']->pluck('created_at')->map(function ($date) {
            return $date->format('d F Y');
        })->unique()->values();

        return view('guru.lms.materi', $data);
    }

    public function materiDetail($id)
    {
        $data['materi'] = materi::findOrFail($id);
        return view('guru.lms.materi.detail', $data);
    }

    public function materiCreateView()
    {
        $data['kelas_mata_pelajaran'] = kelas_mata_pelajaran::with('kelas', 'mata_pelajaran')->where('guru_id', auth()->guard(name: 'web-guru')->user()->id_guru)->WhereHas('tahun_ajaran', fn($query) => $query->where('aktif', 1))->get();
        $data['topik'] = topik::with('kelas_mata_pelajaran')->whereIn('kelas_mata_pelajaran_id', $data['kelas_mata_pelajaran']->pluck('id_kelas_mata_pelajaran'))->get();

        return view('guru.lms.materi.create_view', $data);
    }

    public function materiCreate($id)
    {
        $data['kelas_mata_pelajaran'] = kelas_mata_pelajaran::findOrFail($id);
        $data['topik'] = topik::where('kelas_mata_pelajaran_id', $id)->get();
        $data['materi_old'] = materi::where('kelas_mata_pelajaran_id', $id)->where('status', 0)->first();

        return view('guru.lms.materi.create', $data);
    }

    public function materiStore(Request $request)
    {
        $request->validate([
            'judul_materi' => 'required|string|max:255',
            'file_materi' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:2048',
        ]);

        $status = $request->has('post') ? 1 : 0;

        $materi = materi::create(
            [
                'kelas_mata_pelajaran_id' => $request->id_kelas_mata_pelajaran,
                'topik_id' => $request->id_topik,
                'judul_materi' => $request->judul_materi,
                'deskripsi_materi' => $request->deskripsi_materi,
                'tanggal_dibuat' => now(),
                'status' => $status,
            ]
        );

        if ($request->hasFile('file_materi')) {
            $file = $request->file('file_materi');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/materi', $fileName, 'public');
            $fileType = $file->getClientMimeType();

            file_materi::create(
                [
                    'materi_id' => $materi->id_materi,
                    'file_path' => $filePath,
                    'file_type' => $fileType,
                    'upload_at' => now(),
                    'status' => $status,
                ]
            );
        }

        return redirect()->route('guru.dashboard.lms.materi')->with('success', 'Materi created successfully.');
    }
}
