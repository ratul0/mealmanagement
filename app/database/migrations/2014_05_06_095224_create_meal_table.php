<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meal', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('count')->unsigned()->default(0);
			$table->timestamps();

			$table->foreign('user_id')
					->references('id')->on('users')
					->onUpdate('cascade')
					->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meal');
	}

}
