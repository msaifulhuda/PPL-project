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
        Schema::create('nilai_mapel', function (Blueprint $table) {
            $table->uuid('id_nilai_mapel')->primary();  
            $table->uuid('mapel_id');
            $table->uuid('rapor_id');
            $table->timestamps();
            $table->foreign('mapel_id')->references('id_mapel')->on('mata_pelajaran');
            $table->foreign('rapor_id')->references('id_rapor')->on('rapor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_mapel');
    }
};
