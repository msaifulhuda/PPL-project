<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prestasi extends Model
{
    use HasFactory;

    // Mengatur UUID sebagai primary key
    protected $keyType = 'string';
    public $incrementing = false;

    // Event untuk mengisi UUID otomatis
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = $model->id ?? (string) Str::uuid();
        });
    }

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'siswa_id', 'id_prestasi', 'nama_prestasi', 'bukti_prestasi', 'deskripsi_prestasi', 'status_prestasi'
    ];
}
