<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class mata_pelajaran extends Model
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
    protected $table = 'mata_pelajaran';
    protected $fillable = [
        'nama_matpel',
        'deskripsi_matpel',
    ];
    public function kelasMataPelajaran()
    {
        return $this->hasMany(kelas_mata_pelajaran::class, 'mata_pelajaran_id', 'id_matpel');
    }
    public function nilaimapel()
    {
        return $this->hasMany(Nilai_mapel::class,'matpel_id', 'id_matpel');
    }
    public function gurumatapeljaran()
    {
        return $this->hasMany(guru_mata_pelajaran::class,'matpel_id', 'id_matpel' );
    }
    public function topik()
    {
        return $this->hasMany(topik::class,'mata_pelajaran_id', 'id_matpel' );
    }
}
