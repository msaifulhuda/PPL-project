<?php

namespace App\Http\Controllers\guru\lms;

use Carbon\Carbon;

use App\Models\topik;
use App\Models\tugas;
use App\Models\materi;
use App\Models\file_tugas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\kelas_mata_pelajaran;

class TugasGuruController extends Controller
{
    public function index()
    {
        $id_guru = auth()->guard('web-guru')->user()->id_guru;
        $kelasMataPelajaran = kelas_mata_pelajaran::with([
            'kelas',
            'mataPelajaran',
            'tugas' => function ($query) {
                $query->orderBy('deadline', 'asc');
            }
        ])
            ->where('guru_id', $id_guru)
            ->whereHas('tahunAjaran', fn($query) => $query->where('aktif', 1))
            ->get();

        $mataPelajaranGrup = $kelasMataPelajaran->groupBy('mata_pelajaran_id')
            ->map(function ($items) {
                return [
                    'mata_pelajaran' => $items->first()->mataPelajaran->nama_matpel,
                    'kelas' => $items->map(function ($item) {
                        return [
                            'nama_kelas' => $item->kelas->nama_kelas,
                            'id_kelas' => $item->kelas->id_kelas,
                            'id_kelas_matapelajaran' => $item->id_kelas_matapelajaran,
                            'tugas' => $item->tugas
                        ];
                    })
                ];
            });

        $allTasks = $kelasMataPelajaran->flatMap(function ($mapel) {
            return $mapel->tugas;
        })->sortBy('created_at')->groupBy(function ($task) {
            return Carbon::parse($task->created_at)->format('Y-m-d');
        });

        return view('guru.lms.tugas', [
            'mataPelajaranGrup' => $mataPelajaranGrup,
            'allTasks' => $allTasks,
            'kelasMataPelajaran' => $kelasMataPelajaran
        ]);
    }

    public function forumTugas($id)
    {
        $kelasMataPelajaran = kelas_mata_pelajaran::with([
            'mataPelajaran:id_matpel,nama_matpel',
            'topik' => function ($query) {
                $query->orderBy('created_at', 'desc');
                $query->with([
                    'tugas' => function ($q) {
                        $q->orderBy('created_at', 'desc');
                    },
                    'materi' => function ($q) {
                        $q->orderBy('created_at', 'desc');
                    }
                ]);
            },
            'kelas:id_kelas,nama_kelas',
        ])->findOrFail($id);

        $tugasTanpaTopik = tugas::where('kelas_mata_pelajaran_id', $id)
            ->whereNull('topik_id')
            ->orderBy('created_at', 'desc')
            ->get();

        $materiTanpaTopik = materi::where('kelas_mata_pelajaran_id', $id)
            ->whereNull('topik_id')
            ->orderBy('created_at', 'desc')
            ->get();



        return view('guru.lms.forum_tugas', [
            'id' => $kelasMataPelajaran->id_kelas_mata_pelajaran,
            'mataPelajaran' => $kelasMataPelajaran->mataPelajaran,
            'listTopik' => $kelasMataPelajaran->topik,
            'kelas' => $kelasMataPelajaran->kelas,
            'tugasTanpaTopik' => $tugasTanpaTopik,
            'materiTanpaTopik' => $materiTanpaTopik
        ]);
    }

    public function create($id)
    {
        $kelasMataPelajaran = kelas_mata_pelajaran::with([
            'mataPelajaran:id_matpel,nama_matpel',
            'kelas:id_kelas,nama_kelas',
        ])->findOrFail($id);
        $topiks = topik::where('kelas_mata_pelajaran_id', $id)->get();
        return view('guru.lms.tugas.create', [
            'id' => $id,
            'mataPelajaran' => $kelasMataPelajaran->mataPelajaran,
            'kelas' => $kelasMataPelajaran->kelas,
            'topiks' => $topiks
        ]);
    }



    public function detail($id)
    {
        $tugas = Tugas::with(['filetugas', 'topik', 'kelasMataPelajaran'])->findOrFail($id);
        return view('guru.lms.tugas.detail', compact('tugas'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'judul_tugas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file_tugas.*' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xlsx|max:2048',
            'tenggat' => 'required|date',
            'kelas_mata_pelajaran_id' => 'required|exists:kelas_mata_pelajaran,id_kelas_mata_pelajaran'
        ]);

        $topik_id = $request->topik_id ?? null;
        try {
            DB::beginTransaction();

            $tugas = tugas::create([
                'kelas_mata_pelajaran_id' => $request->kelas_mata_pelajaran_id,
                'topik_id' => $topik_id,
                'judul' => $request->judul_tugas,
                'deskripsi' => $request->deskripsi,
                'deadline' => Carbon::parse($request->tenggat)->format('Y-m-d H:i:s'),
                'created_at' => now(),
            ]);



            if ($request->hasFile('files')) {
                $this->handleFileUploads($request->file('files'), $tugas->id_tugas);
            }

            DB::commit();
            return redirect()->route('guru.dashboard.lms.forum.tugas', $request->kelas_mata_pelajaran_id)->with('success', 'Tugas berhasil dibuat');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }




    public function edit($id)
    {
        $tugas = tugas::with([
            'filetugas',
            'topik',
            'kelasMataPelajaran' => function ($query) {
                $query->with(['mataPelajaran', 'kelas']);
            }
        ])->findOrFail($id);

        $topiks = topik::where('kelas_mata_pelajaran_id', $tugas->kelas_mata_pelajaran_id)->get();

        return view('guru.lms.tugas.edit', [
            'tugas' => $tugas,
            'mataPelajaran' => $tugas->kelasMataPelajaran->mataPelajaran,
            'kelas' => $tugas->kelasMataPelajaran->kelas,
            'topiks' => $topiks
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_tugas' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_tugas.*' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xlsx|max:2048',
            'tenggat' => 'required|date',
            'kelas_mata_pelajaran_id' => 'required|exists:kelas_mata_pelajaran,id_kelas_mata_pelajaran'
        ]);

        try {
            DB::beginTransaction();

            // Find the existing task
            $tugas = tugas::findOrFail($id);

            // Update task details
            $tugas->update([
                'topik_id' => $request->topik_id ?? null,
                'judul' => $request->judul_tugas,
                'deskripsi' => $request->deskripsi,
                'deadline' => Carbon::parse($request->tenggat)->format('Y-m-d H:i:s'),
                'updated_at' => now(),
            ]);

            // Handle removed existing files
            if ($request->filled('removed_files')) {
                $removedFileIds = explode(',', $request->removed_files);
                // Delete files from storage and database
                $removedFiles = file_tugas::whereIn('id_file_tugas', $removedFileIds)->get();

                foreach ($removedFiles as $file) {
                    // Delete file from storage
                    Storage::disk('public')->delete($file->file_path);
                    // Delete file record from database
                    $file->delete();
                }
            }

            // Handle new file uploads
            if ($request->hasFile('files')) {
                $this->handleFileUploads($request->file('files'), $tugas->id_tugas);
            }

            DB::commit();
            return redirect()->route('guru.dashboard.lms.forum.tugas', $tugas->kelas_mata_pelajaran_id)
                ->with('success', 'Tugas berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    private function handleFileUploads($files, $tugas_id)
    {
        foreach ($files as $file) {

            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/file_tugas', $fileName, 'public');
            $fileType = $file->getClientMimeType();

            file_tugas::create([
                'tugas_id' => $tugas_id,
                'file_path' => $path,
                'file_type' => $fileType,
                'original_name' => $file->getClientOriginalName(),
                'upload_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
