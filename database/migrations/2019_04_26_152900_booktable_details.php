<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BooktableDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booktable_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('booktable_id');
            $table->unsignedInteger('menu_id')->nullable();
            $table->unsignedInteger('combo_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->foreign('booktable_id')->references('booktable_id')->on('booktable');
            $table->foreign('menu_id')->references('menu_id')->on('menu');
            $table->foreign('combo_id')->references('combo_id')->on('combo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booktable_details');
    }
}
