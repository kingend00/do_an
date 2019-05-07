<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Booktable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booktable', function (Blueprint $table) {
            $table->increments('booktable_id');
            $table->unsignedInteger('number_seat');
            $table->string('email');
            $table->string('name');
            $table->text('phone');
            $table->text('date');
            $table->text('time');
            $table->string('status')->default('wait');
            $table->integer('total')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booktable');
    }
}
