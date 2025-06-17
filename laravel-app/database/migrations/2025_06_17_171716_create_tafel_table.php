<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTafelTable extends Migration
{
    public function up()
    {
        Schema::create('tafel', function (Blueprint $table) {
            $table->id('idTafel');
            $table->integer('nummer')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tafel');
    }
}