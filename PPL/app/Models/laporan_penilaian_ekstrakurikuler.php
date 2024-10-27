<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class laporan_penilaian_ekstrakurikuler extends Model
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


     protected $table = 'laporan_penilaian_ekstrakurikuler';

     protected $fillable = [
         'id_pembina',
         'id_pengurus',
         'id_ekstrakurikuler',
         'isi_laporan',
         'tgl_laporan',
     ];
 
     /**
      * Relationship with PembinaEkstra
      */
     public function pembina()
     {
         return $this->belongsTo(PembinaEkstra::class, 'id_pembina', 'id_pembina_ekstra');
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
     public function penilaianekstra()
     {
         return $this->hasMany(penilaian_ekstrakurikuler::class,'id_laporan', 'id_laporan' );
     }
}
