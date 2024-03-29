<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->string('cpf', 14);
            $table->string('address');
            $table->string('number');
            $table->string('address_suplement')->nullable();
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('secretaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('responsible');

            $table->timestamps();
        });

        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');

            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cpf', 14);
            $table->string('address');
            $table->string('number');
            $table->string('address_suplement');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');

            $table->string('login');
            $table->string('password');

            $table->timestamps();
        });

        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hash', 8)->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('type_id')->unsigned();
            $table->integer('secretary_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->string('subject', 25);
            $table->longText('description');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('secretary_id')->references('id')->on('secretaries');
            $table->foreign('status_id')->references('id')->on('statuses');
        });

        Schema::create('stages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id')->unsigned();
            $table->integer('employee_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned();
            $table->string('answer')->nullable();

            $table->timestamps();

            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stages');
        Schema::drop('requests');
        Schema::drop('employees');
        Schema::drop('users');
        Schema::drop('statuses');
        Schema::drop('secretaries');
        Schema::drop('types');
    }
}
