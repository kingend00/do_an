<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComboDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('combo_id')->nullable();
            $table->unsignedInteger('menu_id')->nullable();
            $table->integer('quantity')->default(1);
            $table->string('type')->default('sp');
            $table->foreign('combo_id')->references('combo_id')->on('combo');
            $table->foreign('menu_id')->references('menu_id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combo_details');
    }
}
