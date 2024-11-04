<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class KelasSiswa extends Model
{
    use HasUuids;

    protected $table = 'kelas_siswas';
    protected $primaryKey = 'id_kelas_siswa';
    public $incrementing = false;
    public $timestamps = true;
    protected $keyType = 'string';  


    protected $fillable = [
        'id_kelas_siswa',
        'id_kelas',
        'id_siswa',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }
}
