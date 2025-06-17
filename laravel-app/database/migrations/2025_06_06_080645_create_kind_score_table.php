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
        Schema::create('kind_score', function (Blueprint $table) {
            $table->id('idKindScore');
            $table->timestamps();
            $table->unsignedBigInteger('idKind');
            $table->unsignedBigInteger('idScore');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kind_score');
    }
};
