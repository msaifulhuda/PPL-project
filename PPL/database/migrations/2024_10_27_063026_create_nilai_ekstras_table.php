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
        Schema::create('nilai_ekstras', function (Blueprint $table) {
            $table->uuid('id_nilai_ekstra')->primary();
            $table->uuid('ekstra_id');
            $table->string('pesan');
            $table->string('ekstra_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_ekstras');
    }
};
