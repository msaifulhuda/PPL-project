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
        Schema::create('nilai_ekstra', function (Blueprint $table) {
            $table->uuid('id_nilai_ekstra')->primary();
            $table->uuid('ekstrakurikuler_id');
            $table->string('pesan');
            $table->timestamps();
            $table->foreign('ekstrakurikuler_id')->references('id_ekstrakurikuler')->on('ekstrakurikuler');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_ekstra');
    }
};
