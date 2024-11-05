<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;

class PengurusEkstra extends Model
{
    use HasUuids, Notifiable;

    protected $table = 'pengurus_ekstra';
    
    protected $primaryKey = 'id_pengurus_ekstra';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id_pengurus_ekstra',
        'id_siswa',
        'id_ekstrakurikuler',
    ];

    /**
     * Relationship with Siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    /**
     * Relationship with Ekstrakurikuler
     */
    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'id_ekstrakurikuler', 'id_ekstrakurikuler');
    }

    /**
     * Relationship with LaporanPenilaianEkstra
     */
    public function laporanpenilaianekstra()
    {
        return $this->hasMany(laporan_penilaian_ekstrakurikuler::class, 'id_pengurus', 'id_pengurus_ekstra');
    }

    public function postinganekstra()
    {
        return $this->hasMany(posting_ekstrakurikuler::class,'id_pengurus', 'id_pengurus_ekstra' );
    }
    public function registrasiekstra()
    {
        return $this->hasMany(registrasi_ekstrakurikuler::class,'id_pengurus', 'id_pengurus_ekstra' );
    }
}
