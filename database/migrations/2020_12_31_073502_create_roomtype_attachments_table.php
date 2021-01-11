<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomtypeAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomtype_attachments', function (Blueprint $table) {
            $table->id();
            $table->longText('data_uri');
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
        Schema::dropIfExists('roomtype_attachments');
    }
}
