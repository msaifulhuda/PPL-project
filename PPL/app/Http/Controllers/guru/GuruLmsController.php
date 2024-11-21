<?php

namespace App\Http\Controllers\guru;

use App\Models\materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kelas_mata_pelajaran;
use App\Models\topik;
use App\Models\file_materi;
use App\Models\notifikasi_sistem;

class GuruLmsController extends Controller
{


    public function materi()
    {
        $data['kelas_mata_pelajaran'] = kelas_mata_pelajaran::with('kelas', 'mataPelajaran')->where('guru_id', auth()->guard(name: 'web-guru')->user()->id_guru)->WhereHas('tahunAjaran', fn($query) => $query->where('aktif', 1))->get();
        $data['materi'] = materi::whereIn('kelas_mata_pelajaran_id', $data['kelas_mata_pelajaran']->pluck('id_kelas_mata_pelajaran'))->where('status', 1)->get();
        $data['materi_baru'] = materi::whereIn('kelas_mata_pelajaran_id', $data['kelas_mata_pelajaran']->pluck('id_kelas_mata_pelajaran'))->orderBy('created_at', 'desc')->get();
        $data['materi_baru_date'] = $data['materi_baru']->pluck('updated_at')->map(function ($date) {
            return $date->format('d F Y');
        })->unique()->values();

        return view('guru.lms.materi', $data);
    }

    public function materiDetail($id)
    {
        $data['materi'] = materi::findOrFail($id);
        $data['file_materi'] = file_materi::where('materi_id', $id)->get();

        return view('guru.lms.materi.detail', $data);
    }

    public function materiCreateView()
    {
        $data['kelas_mata_pelajaran'] = kelas_mata_pelajaran::with('kelas', 'mataPelajaran')->where('guru_id', auth()->guard(name: 'web-guru')->user()->id_guru)->WhereHas('tahunAjaran', fn($query) => $query->where('aktif', 1))->get();
        $data['topik'] = topik::with('kelasMataPelajaran')->whereIn('kelas_mata_pelajaran_id', $data['kelas_mata_pelajaran']->pluck('id_kelas_mata_pelajaran'))->get();


        return view('guru.lms.materi.create_view', $data);
    }

    public function materiCreate($id)
    {
        $data['id'] = $id;
        $data['kelas_mata_pelajaran'] = kelas_mata_pelajaran::findOrFail($id);
        $data['topik'] = topik::where('kelas_mata_pelajaran_id', $id)->get();
        $data['materi_old'] = materi::where('kelas_mata_pelajaran_id', $id)->where('status', 0)->first();
        $data['mata_pelajaran'] = $data['kelas_mata_pelajaran']->mataPelajaran;

        if ($data['materi_old']) $data['file_materi_old'] = file_materi::where('materi_id', $data['materi_old']->id_materi)->get();

        return view('guru.lms.materi.create', $data);
    }

    public function materiStore(Request $request)
    {
        // Validation
        $rule = [
            'judul_materi' => 'required|string|max:255',
            'file_materi.*' => 'file|mimes:pdf,doc,docx,ppt,pptx,xlsx|max:10240',
        ];
        if ($request->has('post')) $rule['file_materi'] = 'required|array';

        $request->validate($rule);

        // Insert into Materi Table
        $status = $request->has('post') ? 1 : 0;
        if (!$request->has('post')) {
            $materi = materi::findOrFail($request->id_materi);
            $materi->update(
                [
                    'kelas_mata_pelajaran_id' => $request->id_kelas_mata_pelajaran,
                    'topik_id' => $request->topik_id,
                    'judul_materi' => $request->judul_materi,
                    'deskripsi' => $request->deskripsi,
                    'status' => $status,
                ]
            );
        } else {
            $materi = materi::create(
                [
                    'kelas_mata_pelajaran_id' => $request->id_kelas_mata_pelajaran,
                    'topik_id' => $request->topik_id,
                    'judul_materi' => $request->judul_materi,
                    'deskripsi' => $request->deskripsi,
                    'status' => $status,
                ]
            );
        }

        // Insert into File Materi Table
        if ($request->hasFile('file_materi')) {
            if ($request->has('post')) {
                $fileMateri = file_materi::where('materi_id', $request->id_materi)->get();
                foreach ($fileMateri as $file) {
                    \Storage::disk('public')->delete($file->file_path);
                    $file->delete();
                }
            }

            foreach ($request->file('file_materi') as $file) {
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
        }

        // Insert into Notifikasi Table
        if ($request->has('post')) {
            $kelas_mata_pelajaran = kelas_mata_pelajaran::with('kelas')->findOrFail($request->id_kelas_mata_pelajaran);
            $siswa = $kelas_mata_pelajaran->kelas->siswa;

            foreach ($siswa as $item) {
                notifikasi_sistem::create(
                    [
                        'materi_id' => $materi->id_materi,
                        'siswa_id' => $item->id_siswa,
                        'status' => 0,
                    ]
                );
            }
        }

        return redirect()->route('guru.dashboard.lms.materi')->with('success', 'Materi created successfully.');
    }

    public function materiEdit($id)
    {
        $data['id'] = $id;
        $data['materi'] = materi::findOrFail($id);
        $data['kelas_mata_pelajaran'] = kelas_mata_pelajaran::findOrFail($data['materi']->kelas_mata_pelajaran_id);
        $data['topik'] = topik::where('kelas_mata_pelajaran_id', $data['kelas_mata_pelajaran']->id_kelas_mata_pelajaran)->get();
        $data['file_materi_old'] = file_materi::where('materi_id', $id)->get();
        $data['mata_pelajaran'] = $data['kelas_mata_pelajaran']->mataPelajaran;

        return view('guru.lms.materi.edit', $data);
    }

    public function materiUpdate(Request $request, $id)
    {
        $request->validate([
            'judul_materi' => 'required|string|max:255',
            'file_materi.*' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xlsx|max:2048',
        ]);

        $materi = materi::findOrFail($id);
        $materi->update(
            [
                'kelas_mata_pelajaran_id' => $request->id_kelas_mata_pelajaran,
                'topik_id' => $request->topik_id,
                'judul_materi' => $request->judul_materi,
                'deskripsi' => $request->deskripsi,
                'updated_at' => now()
            ]
        );

        if ($request->hasFile('file_materi')) {
            $fileMateri = file_materi::where('materi_id', $id)->get();
            foreach ($fileMateri as $file) {
                \Storage::disk('public')->delete($file->file_path);
                $file->delete();
            }

            foreach ($request->file('file_materi') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads/materi', $fileName, 'public');
                $fileType = $file->getClientMimeType();

                file_materi::create(
                    [
                        'materi_id' => $id,
                        'file_path' => $filePath,
                        'file_type' => $fileType,
                        'upload_at' => now(),
                        'status' => 1
                    ]
                );
            }
        }

        return redirect()->route('guru.dashboard.lms.materi')->with('success', 'Materi updated successfully.');
    }

    public function materiDestroy($id)
    {
        $materi = materi::find($id);

        if ($materi) {
            $fileMateri = file_materi::where('materi_id', $id)->get();
            foreach ($fileMateri as $file) {
                \Storage::disk('public')->delete($file->file_path);
                $file->delete();
            }
            $materi->delete();
        }

        return redirect()->route('guru.dashboard.lms.materi')->with('success', 'Materi deleted successfully.');
    }
}
