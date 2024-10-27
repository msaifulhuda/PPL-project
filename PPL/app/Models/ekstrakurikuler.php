<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class ekstrakurikuler extends Model
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


     protected $table = 'ekstrakurikuler';

     protected $fillable = [
         'id_pembina',
         'nama_ekstrakurikuler',
         'deskripsi',
         'gambar',
     ];
     /**
     * Relationship with PembinaEkstra
     */
    public function pembinaEkstra()
    {
        return $this->belongsTo(PembinaEkstra::class, 'id_pembina', 'id_pembina_ekstra');
    }

    /**
     * Relationship with RegistrasiEkstrakurikuler
     */
    public function nilaiekstra()
    {
        return $this->hasMany(Nilai_ekstra::class );
    }
    public function pengurusekstra()
    {
        return $this->hasMany(PengurusEkstra::class,'id_ekstrakurikuler', 'id_ekstrakurikuler');
    }
    public function inventarisekstra()
    {
        return $this->hasMany(inventaris_ekstrakurikuler::class,'id_ekstrakurikuler', 'id_ekstrakurikuler');
    }
    public function laporanpenilaianekstra()
    {
        return $this->hasMany(laporan_penilaian_ekstrakurikuler::class,'id_ekstrakurikuler', 'id_ekstrakurikuler' );
    }
    public function postinganekstra()
    {
        return $this->hasMany(posting_ekstrakurikuler::class,'id_ekstrakurikuler', 'id_ekstrakurikuler');
    }
    public function prestasiekstra()
    {
        return $this->hasMany(prestasi_ektrakurikuler::class,'id_ekstrakurikuler', 'id_ekstrakurikuler');
    }
    public function registrasiekstra()
    {
        return $this->hasMany(registrasi_ekstrakurikuler::class,'id_ekstrakurikuler', 'id_ekstrakurikuler' );
    }
}
