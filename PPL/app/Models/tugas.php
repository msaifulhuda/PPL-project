<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class tugas extends Model
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
    protected $table = 'tugas';

    protected $fillable = [
        'judul',
        'deskripsi',
        'topik_id',
        'deadline',
        'kelas_mata_pelajaran_id',
    ];

    /**
     * Relationship with Topik model
     */
    public function topik()
    {
        return $this->belongsTo(Topik::class, 'topik_id', 'id_topik');
    }

    /**
     * Relationship with KelasMataPelajaran model
     */
    public function kelasMataPelajaran()
    {
        return $this->belongsTo(kelas_mata_pelajaran::class, 'kelas_mata_pelajaran_id', 'id_kelas_mata_pelajaran');
    }
    public function pengumpulantugas()
    {
        return $this->hasMany(pengumpulan_tugas::class);
    }
    public function filetugas()
    {
        return $this->hasMany(file_tugas::class);
    }
}
