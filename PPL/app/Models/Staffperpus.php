<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staffperpus extends Authenticatable
{
    public $timestamps = false;
    protected $primaryKey = 'id_staff_perpustakaan';

    /**
     * The "booting" function of model
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot(); // Pastikan memanggil parent::boot()
        static::creating(function ($model) {
            if (! $model->getKey()) {
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

    protected $table = 'staffperpus';
    protected $fillable = [
        'id_staff_perpustakaan',
        'username',
        'password',
        'email',
        'google_key_staff_perpustakaan',
        'foto_staff_perpustakaan',
        'nomor_wa_staff_perpustakaan',
    ];
}
