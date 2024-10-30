<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class Guru extends Model
{
    use Notifiable;

    /**
     * The "booting" function of model
     *
     * @return void
     */
    protected static function boot() {
        parent::boot();
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
    protected $table = 'guru';
    protected $fillable = [
        'id_guru',
        'nip',
        'nama_guru',
        'email_guru',
        'google_key_guru',
        'foto_guru',
        'nomor_wa_guru',
        'username_guru',
        'password_guru',
        'alamat_guru',
        'role_guru',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id_guru';
    public function gurumatapelajaran()
    {
        return $this->hasMany(guru_mata_pelajaran::class,'id_laporan', 'id_laporan' );
    }
    public function kelasmatapelajaran()
    {
        return $this->hasMany(kelas_mata_pelajaran::class,'id_laporan', 'id_laporan' );
    }
}
