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
        Schema::disableForeignKeyConstraints();

        Schema::create('histori_inventaris', function (Blueprint $table) {
            $table->uuid('id_histori')->primary();
            $table->uuid('id_inventaris');
            $table->foreign('id_inventaris')->references('id_inventaris')->on('inventaris_ekstrakurikuler');
            $table->timestamp('histori_keluar');
            $table->timestamp('histori_masuk');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_inventaris');
    }
};
