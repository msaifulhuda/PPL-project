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
        Schema::create('notifikasi_sistem', function (Blueprint $table) {
            $table->id('id_notifikasi_sistem');
            $table->uuid('materi_id');
            $table->uuid('siswa_id');
            $table->string('status');
            $table->date('tanggal_dibuat');
            $table->date('tanggal_dilihat');
            $table->foreign('materi_id')->references('id_materi')->on('materi');
            $table->foreign('siswa_id')->references('id_siswa')->on('siswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi_sistem');
    }
};
