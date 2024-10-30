<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Siswa extends Authenticatable
{
        use Notifiable;
    public $timestamps = false;
    protected $primaryKey = 'id_siswa';
    /**
     * The "booting" function of model
     *
     * @return void
     */
    protected static function boot() {
        parent::boot(); // Pastikan memanggil parent::boot()
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
    protected $table = 'siswa';
    protected $fillable = [
        'id_siswa',
        'kelas_id',
        'nisn',
        'nama_siswa',
        'tgl_lahir_siswa',
        'jenis_kelamin_siswa',
        'alamat_siswa',
        'foto_siswa',
        'nomor_wa_siswa',
        'role_siswa',
        'username',
        'password',
        'email',
        'google_key_siswa',
    ];
    public function pengurusekstra()
    {
        return $this->hasMany(PengurusEkstra::class,'id_siswa', 'id_siswa' );
    }
    public function rapor()
    {
        return $this->hasMany(Rapor::class);
    }
    public function absensisiswa()
    {
        return $this->hasMany(absensi_siswa::class);
    }
    public function notifikasisistem()
    {
        return $this->hasMany(notifikasi_sistem::class);
    }
    public function pengumpulantugas()
    {
        return $this->hasMany(pengumpulan_tugas::class );
    }
    public function pengumpulanujian()
    {
        return $this->hasMany(pengumpulan_ujian::class );
    }
    public function penilaianekstra()
    {
        return $this->hasMany(penilaian_ekstrakurikuler::class,'id_siswa', 'id_siswa' );
    }
    public function prestasi()
    {
        return $this->hasMany(prestasi::class );
    }
    public function registrasiekstra()
    {
        return $this->hasMany(registrasi_ekstrakurikuler::class,'id_siswa', 'id_siswa' );
    }

    
}
