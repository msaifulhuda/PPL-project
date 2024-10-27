<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class histori_inventaris extends Model
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


     protected $table = 'histori_inventaris';

     protected $fillable = [
         'id_inventaris',
         'histori_keluar',
         'histori_masuk',
     ];
 
     /**
      * Relationship with InventarisEkstrakurikuler
      */
     public function inventarisEkstrakurikuler()
     {
         return $this->belongsTo(inventaris_ekstrakurikuler::class, 'id_inventaris', 'id_inventaris');
     }
}
