<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsreservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomsreservations', function (Blueprint $table) {
            $table->id();
            $table->float('advance')->nullable();
            $table->float('rest_price')->nullable();
            $table->float('full_price')->nullable();
            $table->boolean('status');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomsreservations');
    }
}
