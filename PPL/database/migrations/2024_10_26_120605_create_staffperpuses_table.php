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
            $table->string('username');
            $table->string('password');
            $table->string('email')->nullable();
            $table->string('google_key_staff_perpustakaan')->nullable();
            $table->string('foto_staff_perpustakaan')->nullable();
            $table->string('nomor_wa_staff_perpustakaan')->nullable();
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
