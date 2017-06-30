<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimilaritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('similarities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entity1_id')->unsigned();
            $table->integer('entity2_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('confidence')->unsigned();
            $table->integer('similarity')->unsigned();
            $table->timestamps();
            
            $table->foreign('entity1_id')->references('id')->on('entities');
            $table->foreign('entity2_id')->references('id')->on('entities');
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
        Schema::dropIfExists('similarities');
    }
}
