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
            $table->string('email_guru');
            $table->string('google_key_guru');
            $table->string('foto_guru');
            $table->string('nomor_wa_guru');
            $table->string('username_guru');
            $table->string('password_guru');
            $table->string('alamat_guru');
            $table->string('role_guru');
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
