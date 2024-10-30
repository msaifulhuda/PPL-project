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

        Schema::create('laporan_penilaian_ekstrakurikuler', function (Blueprint $table) {
            $table->uuid('id_laporan')->primary();
            $table->uuid('guru_id');
            $table->foreign('guru_id')->references('id_guru')->on('guru');
            $table->uuid('id_pengurus');
            $table->foreign('id_pengurus')->references('id_pengurus_ekstra')->on('pengurus_ekstra');
            $table->uuid('id_ekstrakurikuler');
            $table->foreign('id_ekstrakurikuler')->references('id_ekstrakurikuler')->on('ekstrakurikuler');
            $table->text('isi_laporan');
            $table->timestamp('tgl_laporan');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penilaian_ekstrakurikuler');
    }
};
