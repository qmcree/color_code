<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('options', function($table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('text', 100);
        });

        Schema::table('options', function($table) {
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('category_id')->references('id')->on('categories');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('options');
	}

}
