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
        Schema::create('guru', function (Blueprint $table) {
            $table->uuid('id_guru')->primary();
            $table->string('nip')->nullable();
            $table->string('nama_guru')->nullable();
            $table->string('email')->nullable();
            $table->string('google_key_guru')->nullable();
            $table->string('foto_guru')->nullable();
            $table->string('nomor_wa_guru')->nullable();
            $table->string('username');
            $table->string('password');
            $table->string('alamat_guru')->nullable();
            $table->enum('role_guru',['guru','pembina','wali_kelas']);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
