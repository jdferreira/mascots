<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix');
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('gender_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('country_id')->references('id')->on('countries');
        });
        
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('roles_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        Schema::create('networks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('social_handles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('network_id')->unsigned();
            $table->text('handle');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('network_id')->references('id')->on('networks');
        });
        
        Schema::create('interests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('added_by')->unsigned();
            $table->timestamps();
            
            $table->foreign('added_by')->references('id')->on('users');
        });
        
        Schema::create('user_interests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('interest_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('interest_id')->references('id')->on('interests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_interests');
        Schema::dropIfExists('interests');
        Schema::dropIfExists('social_handles');
        Schema::dropIfExists('networks');
        Schema::dropIfExists('roles_users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('genders');
    }
}
