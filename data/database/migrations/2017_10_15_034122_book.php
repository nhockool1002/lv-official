<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id')->unsigned();
			$table->string('book_name');
			$table->text('book_desc');
			$table->integer('edition');
			$table->string('img');
            $table->string('filename');
			$table->integer('auth_id')->unsigned();
			$table->foreign('auth_id')->references('id')->on('author')->onDelete('cascade');
			$table->integer('cat_id')->unsigned();
			$table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
			$table->integer('pub_id')->unsigned();
			$table->foreign('pub_id')->references('id')->on('publisher')->onDelete('cascade');
            $table->integer('lang_id')->unsigned();
            $table->foreign('lang_id')->references('id')->on('languages')->onDelete('cascade');
            $table->boolean('specially')->default(0);
			$table->boolean('credits')->default(0);
            $table->string('url');
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
        Schema::drop('book');
    }
}
