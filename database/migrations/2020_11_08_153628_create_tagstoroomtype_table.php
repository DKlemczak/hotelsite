<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagstoroomtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomtags_roomtypes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roomtags_id');
            $table->foreign('roomtags_id')->references('id')->on('roomtags');
            $table->unsignedBigInteger('roomtypes_id');
            $table->foreign('roomtypes_id')->references('id')->on('roomtypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomtags_roomtypes');
    }
}
