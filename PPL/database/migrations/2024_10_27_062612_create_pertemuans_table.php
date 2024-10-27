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
        Schema::create('pertemuan', function (Blueprint $table) {
            $table->uuid('id_pertemuan')->primary();
            $table->uuid('jadwal_id');
            $table->date('tanggal_pertemuan');
            $table->string('qr_code');
            $table->timestamps();
            $table->foreign('jadwal_id')->references('id_jadwal')->on('jadwal');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertemuan');
    }
};
