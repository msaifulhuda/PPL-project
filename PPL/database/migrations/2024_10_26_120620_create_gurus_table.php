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
            $table->string('nip');
            $table->string('nama_guru');
            $table->string('email_guru')->nullable();
            $table->string('google_key_guru')->nullable();
            $table->string('foto_guru')->nullable();
            $table->string('nomor_wa_guru')->nullable();
            $table->string('username_guru')->nullable();
            $table->string('password_guru')->nullable();
            $table->string('alamat_guru')->nullable();
            $table->string('role_guru')->nullable();
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
