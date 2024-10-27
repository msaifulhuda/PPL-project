<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class registrasi_ekstrakurikuler extends Model
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


     protected $table = 'registrasi_ekstrakurikuler';

     protected $fillable = [
         'id_siswa',
         'id_pengurus',
         'id_ekstrakurikuler',
         'riwayat_penyakit',
         'alasan',
         'no_ortu',
         'status',
         'tgl_registrasi',
     ];
 
     /**
      * Relationship with Siswa
      */
     public function siswa()
     {
         return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
     }
 
     /**
      * Relationship with PengurusEkstra
      */
     public function pengurus()
     {
         return $this->belongsTo(PengurusEkstra::class, 'id_pengurus', 'id_pengurus_ekstra');
     }
 
     /**
      * Relationship with Ekstrakurikuler
      */
     public function ekstrakurikuler()
     {
         return $this->belongsTo(Ekstrakurikuler::class, 'id_ekstrakurikuler', 'id_ekstrakurikuler');
     }
     public function berkas()
     {
         return $this->hasMany(berkas::class,'id_registrasi', 'id_registrasi' );
     }
     
}
