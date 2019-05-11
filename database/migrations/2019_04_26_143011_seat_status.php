<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeatStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seat_status', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('number_seat');
            $table->text('date');
            $table->text('time');
            $table->foreign('number_seat')->references('number_seat')->on('seat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seat_status');
    }
}
