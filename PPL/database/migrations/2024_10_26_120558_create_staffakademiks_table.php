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
        Schema::create('staffakademik', function (Blueprint $table) {
            $table->uuid('id_staff_akademik')->primary();    
            $table->string('username');
            $table->string('password');
            $table->string('email')->nullable();
            $table->string('staff_akademik_google_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffakademik');
    }
};
