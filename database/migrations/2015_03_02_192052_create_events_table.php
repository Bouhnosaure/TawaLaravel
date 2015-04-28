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

            $table->string('hashcode')->nullable();

            $table->text('description');

            $table->timestamp('start_time');
            $table->timestamp('end_time');

            $table->string('location');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();

            $table->string('image_min')->nullable();

            $table->boolean('is_private')->default(false);
            $table->boolean('is_valid')->default(false);

            $table->integer('user_id')->unsigned();
            $table->integer('categorie_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('events', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categorie_id')->references('id')->on('categories');
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
