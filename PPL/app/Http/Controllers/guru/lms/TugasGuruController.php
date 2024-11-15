<?php

namespace App\Http\Controllers\guru\lms;

use Carbon\Carbon;

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
            'topik.tugas',
            'kelas:id_kelas,nama_kelas',
        ])->findOrFail($id);


        return view('guru.lms.forum_tugas', [
            'id' => $kelasMataPelajaran->id_kelas_mata_pelajaran,
            'mataPelajaran' => $kelasMataPelajaran->mataPelajaran,
            'listTopik' => $kelasMataPelajaran->topik,
            'kelas' => $kelasMataPelajaran->kelas,
        ]);
    }

    public function detail($id)
    {
        return view('guru.lms.detail_tugas', ['id' => $id]);
    }
}
