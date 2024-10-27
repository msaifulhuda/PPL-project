<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class jawaban_ujian extends Model
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
    protected $table = 'jawaban_ujian';
    protected $fillable = [
        'pengumpulan_ujian_id',
        'soal_id',
        'jawaban_dipilih',
    ];
    public function pengumpulanUjian()
    {
        return $this->belongsTo(pengumpulan_ujian::class, 'pengumpulan_ujian_id', 'id_pengumpulan_ujian');
    }

    public function soalUjian()
    {
        return $this->belongsTo(soal_ujian::class, 'soal_id', 'id_soal_ujian');
    }

    
}
