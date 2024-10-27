<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class PengurusEkstra extends Model
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
    protected $table = 'pengurus_ekstra';

    protected $fillable = [
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
    public function laporanpenilaianekstra()
    {
        return $this->hasMany(laporan_penilaian_ekstrakurikuler::class,'id_pengurus', 'id_pengurus_ekstra' );
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
