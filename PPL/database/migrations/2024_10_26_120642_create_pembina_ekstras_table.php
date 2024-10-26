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
        Schema::create('pembina_ekstra', function (Blueprint $table) {
            $table->uuid('id_pembina_ekstra')->primary();
            $table->string('username_pembina_ekstra');
            $table->string('password_pembina_ekstra');
            $table->string('email_pembina_ekstra');
            $table->string('google_key_pembina_ekstra');
            $table->string('no_wa_pembina_ekstra');
            $table->string('alamat_pembina_ekstra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembina_ekstra');
    }
};
