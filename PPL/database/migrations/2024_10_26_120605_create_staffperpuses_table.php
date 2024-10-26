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
        Schema::create('staffperpus', function (Blueprint $table) {
            $table->uuid('id_staff_perpustakaan')->primary();
            $table->string('username_staff_perpustakaan');
            $table->string('password_staff_perpustakaan');
            $table->string('email_staff_perpustakaan');
            $table->string('google_key_staff_perpustakaan');
            $table->string('foto_staff_perpustakaan');
            $table->string('nomor_wa_staff_perpustakaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffperpus');
    }
};
