<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopoversTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stopovers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location');
            $table->string('carpooling_order');
            $table->integer('carpooling_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('stopovers', function (Blueprint $table) {
            $table->foreign('carpooling_id')->references('id')->on('carpoolings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stopovers');
    }

}
