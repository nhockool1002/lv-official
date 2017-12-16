<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
			$table->string('username')->nullable()->default(null)->unique();
			$table->string('password');
			$table->string('email')->nullable()->default(null)->unique();
			$table->bigInteger('phone')->nullable();
			$table->integer('score')->default(0);
			$table->integer('per_id')->unsigned();
			$table->foreign('per_id')->references('id')->on('permission')->onDelete('cascade');
            $table->integer('timeswarning')->default(0);
			$table->rememberToken();
            $table->datetime('lastlogin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
