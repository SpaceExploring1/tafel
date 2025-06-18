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
        Schema::create('kind', function (Blueprint $table) {
            $table->id('idKind');
            $table->timestamps();
            $table->string('gebruikersnaam');
            $table->string('wachtwoord');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kind');
    }
};
