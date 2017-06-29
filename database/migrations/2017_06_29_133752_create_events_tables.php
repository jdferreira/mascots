<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('similarity_id')->unsigned();
            $table->integer('event_type_id')->unsigned();
            $table->text('payload');
            $table->timestamps();
            
            $table->foreign('similarity_id')->references('id')->on('similarities');
            $table->foreign('event_type_id')->references('id')->on('event_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_types');
    }
}
