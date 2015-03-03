<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->string('location');
            $table->string('address');
            $table->string('latlng');
            $table->boolean('is_private');
            $table->boolean('is_valid');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('events', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }

}
