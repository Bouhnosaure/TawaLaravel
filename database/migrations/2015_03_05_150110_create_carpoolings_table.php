<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarpoolingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpoolings', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('name');

            $table->string('slug')->unique()->nullable();

            $table->timestamp('start_time');
            $table->text('description');
            $table->integer('seats');
            $table->decimal('price');
            $table->boolean('is_flexible');
            $table->boolean('is_luggage');


            $table->integer('user_id')->unsigned();
            $table->integer('event_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('carpoolings', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carpoolings');
    }

}
