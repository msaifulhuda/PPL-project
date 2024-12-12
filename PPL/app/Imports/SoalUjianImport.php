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
        return new soal_ujian([
            'teks_soal'    => $row['teks_soal'],
            'judul_ujian'  => $row['judul_ujian'],
            'opsi_a'       => $row['opsi_a'],
            'opsi_b'       => $row['opsi_b'],
            'opsi_c'       => $row['opsi_c'],
            'opsi_d'       => $row['opsi_d'],
            'kunci_jawaban'=> $row['kunci_jawaban'],
        ]);
    }
}
