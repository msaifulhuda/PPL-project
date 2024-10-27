<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class kelas_mata_pelajaran extends Model
{
    use Notifiable;

    /**
     * The "booting" function of model
     *
     * @return void
     */
    protected static function boot() {
        static::creating(function ($model) {
            if ( ! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

     /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'kelas_mata_pelajaran';
    protected $fillable = [
        'kelas_id',
        'mata_pelajaran_id',
        'guru_id',
        'waktu_mulai',
        'waktu_selesai',
        'tahun_ajaran',
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
        return $this->hasMany(materi::class );
    }
    public function pertemuan()
    {
        return $this->hasMany(pertemuan::class );
    }
    public function topik()
    {
        return $this->hasMany(topik::class );
    }
    public function tugas()
    {
        return $this->hasMany(tugas::class);
    }
    public function ujian()
    {
        return $this->hasMany(ujian::class);
    }
}
