<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class kelas_mata_pelajaran extends Model
{
    use Notifiable, HasUuids;


    protected $table = 'kelas_mata_pelajaran';
    protected $primaryKey = 'id_kelas_mata_pelajaran';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_kelas_mata_pelajaran',
        'kelas_id',
        'mata_pelajaran_id',
        'guru_id',
        'hari_id',
        'waktu_mulai',
        'waktu_selesai',
        'tahun_ajaran_id',
    ];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(mata_pelajaran::class, 'mata_pelajaran_id', 'id_matpel');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id_guru');
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(tahun_ajaran::class, 'tahun_ajaran', 'id_tahun_ajaran');
    }
    public function materi()
    {
        return $this->hasMany(Materi::class, 'kelas_mata_pelajaran_id', 'id_kelas_mata_pelajaran');
    }
    public function pertemuan()
    {
        return $this->hasMany(pertemuan::class );
    }
    public function topik()
    {
        return $this->hasMany(topik::class, 'kelas_mata_pelajaran_id', 'id_kelas_mata_pelajaran');
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'kelas_mata_pelajaran_id', 'id_kelas_mata_pelajaran');
    }
    public function ujian()
    {
        return $this->hasMany(ujian::class);
    }
    public function hari()
    {
        return $this->belongsTo(hari::class, 'hari_id', 'id_hari');
    }
}
