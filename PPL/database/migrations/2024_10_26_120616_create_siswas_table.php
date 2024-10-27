<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->uuid('id_siswa')->primary();
            $table->uuid('kelas_id');
            $table->string('nisn');
            $table->string('nama_siswa');
            $table->date('tgl_lahir_siswa');
            $table->enum('jenis_kelamin_siswa', ['Laki-laki', 'Perempuan']);
            $table->string('alamat_siswa');
            $table->string('foto_siswa');
            $table->string('nomor_wa_siswa');
            $table->boolean('role_siswa');
            $table->string('username_siswa');
            $table->string('password_siswa');
            $table->string('email_siswa');
            $table->string('google_key_siswa');
            $table->timestamps();
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
