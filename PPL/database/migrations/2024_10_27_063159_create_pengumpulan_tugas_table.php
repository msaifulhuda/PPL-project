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
        Schema::create('pengumpulan_tugas', function (Blueprint $table) {
            $table->uuid('id_pengumpulan_tugas')->primary();
            $table->uuid('tugas_id');
            $table->uuid('siswa_id');
            $table->string('file_path');
            $table->string('tanggal_pengumpulan');
            $table->string('status');
            $table->string('nilai');
            $table->string('komentar');
            $table->timestamps();
            $table->foreign('tugas_id')->references('id_tugas')->on('tugas');
            $table->foreign('siswa_id')->references('id_siswa')->on('siswa');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulan_tugas');
    }
};
