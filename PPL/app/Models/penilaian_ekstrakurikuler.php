<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class penilaian_ekstrakurikuler extends Model
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


     protected $table = 'penilaian_ekstrakurikuler';

     protected $fillable = [
         'id_siswa',
         'id_tahun_ajaran',
         'id_laporan',
         'penilaian',
     ];
 
     /**
      * Relationship with Siswa
      */
     public function siswa()
     {
         return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
     }
 
     /**
      * Relationship with TahunAjaran
      */
     public function tahunAjaran()
     {
         return $this->belongsTo(tahun_ajaran::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
     }
 
     /**
      * Relationship with LaporanPenilaianEkstrakurikuler
      */
     public function laporan()
     {
         return $this->belongsTo(laporan_penilaian_ekstrakurikuler::class, 'id_laporan', 'id_laporan');
     }
}
