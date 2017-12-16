<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Author extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author', function (Blueprint $table) {
            $table->increments('id')->unsigned();
			$table->string('auth_name');
			$table->string('auth_nickname');
			$table->string('auth_email')->nullable();
			$table->date('date_of_birth');
			$table->date('date_of_death')->nullable();
            $table->string('quote')->nullable();
            $table->text('story')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('national')->nullable();
            $table->string('img')->nullable();
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
        Schema::drop('author');
    }
}
