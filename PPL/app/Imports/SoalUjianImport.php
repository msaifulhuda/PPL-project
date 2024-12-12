<?php

namespace App\Imports;

use App\Models\soal_ujian;
use Maatwebsite\Excel\Concerns\ToModel;

class SoalUjianImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new soal_ujian([
            'judul_ujian'  => $row[0],
            'teks_soal'    => $row[1],
            'opsi_a'       => $row[2],
            'opsi_b'       => $row[3],
            'opsi_c'       => $row[4],
            'opsi_d'       => $row[5],
            'kunci_jawaban'=> $row[6],
        ]);
    }
}
