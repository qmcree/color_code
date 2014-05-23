<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponseOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('response_options', function($table) {
            $table->integer('response_id')->unsigned();
            $table->integer('option_id')->unsigned();
        });

        Schema::table('response_options', function($table) {
            $table->foreign('response_id')->references('id')->on('responses');
            $table->foreign('option_id')->references('id')->on('options');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('response_options');
	}

}
