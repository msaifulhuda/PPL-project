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
        Schema::disableForeignKeyConstraints();

        Schema::create('registrasi_ekstrakurikuler', function (Blueprint $table) {
            $table->uuid('id_registrasi')->primary();
            $table->uuid('id_siswa');
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa');
            $table->uuid('id_pengurus');
            $table->foreign('id_pengurus')->references('id_pengurus_ekstra')->on('pengurus_ekstra');
            $table->uuid('id_ekstrakurikuler');
            $table->foreign('id_ekstrakurikuler')->references('id_ekstrakurikuler')->on('ekstrakurikuler');
            $table->string('riwayat_penyakit');
            $table->text('alasan');
            $table->char('no_ortu');
            $table->enum('status', ["diterima","ditolak","menunggu"]);
            $table->timestamp('tgl_registrasi');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi_ekstrakurikuler');
    }
};
