<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class materi extends Model
{
    use Notifiable, HasUuids;


    protected $table = 'materi';
    protected $primaryKey = 'id_materi';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'judul_materi',
        'topik_id',
        'kelas_mata_pelajaran_id',
        'tanggal_dibuat',
        'status',
    ];
        public function topik()
    {
        return $this->belongsTo(Topik::class, 'topik_id', 'id_topik');
    }

    public function kelasMataPelajaran()
    {
        return $this->belongsTo(kelas_mata_pelajaran::class, 'kelas_mata_pelajaran_id', 'id_kelas_mata_pelajaran');
    }
    public function filemateri()
    {
        return $this->hasMany(file_materi::class,'id_pengurus', 'id_pengurus_ekstra' );
    }
    public function notifikasisistem()
    {
        return $this->hasMany(notifikasi_sistem::class,'id_pengurus', 'id_pengurus_ekstra' );
    }

}
