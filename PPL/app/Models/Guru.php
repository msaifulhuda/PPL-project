<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    use Notifiable, HasUuids, HasFactory;

    protected $primaryKey = 'id_guru';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $table = 'guru';
    protected $fillable = [
        'id_guru',
        'nip',
        'nama_guru',
        'email',
        'google_key_guru',
        'foto_guru',
        'nomor_wa_guru',
        'username',
        'password',
        'alamat_guru',
        'role_guru',
    ];
    public function gurumatapelajaran()
    {
        return $this->hasMany(guru_mata_pelajaran::class, 'id_laporan', 'id_laporan');
    }
    public function kelasmatapelajaran()
    {
        return $this->hasMany(kelas_mata_pelajaran::class, 'id_laporan', 'id_laporan');
    }
    public function ekstrakurikuler()
    {
        return $this->hasMany(Ekstrakurikuler::class);
    }
}
