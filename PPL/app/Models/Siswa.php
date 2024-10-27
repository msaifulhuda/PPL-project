<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class Siswa extends Model
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
    protected $table = 'nilai_mapel';
    protected $fillable = [
        'matpel_id',
        'rapor_id',
    ];
    public function pengurusekstra()
    {
        return $this->hasMany(PengurusEkstra::class,'id_siswa', 'id_siswa' );
    }
    public function rapor()
    {
        return $this->hasMany(Rapor::class);
    }
    public function absensisiswa()
    {
        return $this->hasMany(absensi_siswa::class);
    }
    public function notifikasisistem()
    {
        return $this->hasMany(notifikasi_sistem::class);
    }
    public function pengumpulantugas()
    {
        return $this->hasMany(pengumpulan_tugas::class );
    }
    public function pengumpulanujian()
    {
        return $this->hasMany(pengumpulan_ujian::class );
    }
    public function penilaianekstra()
    {
        return $this->hasMany(penilaian_ekstrakurikuler::class,'id_siswa', 'id_siswa' );
    }
    public function prestasi()
    {
        return $this->hasMany(prestasi::class );
    }
    public function registrasiekstra()
    {
        return $this->hasMany(registrasi_ekstrakurikuler::class,'id_siswa', 'id_siswa' );
    }

    
}
