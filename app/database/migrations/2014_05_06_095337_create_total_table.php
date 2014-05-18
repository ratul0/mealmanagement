<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('total', function($table)
		{
			$table->increments('id');
			$table->integer('total_money')->unsigned()->default(0);
			$table->integer('total_cost')->unsigned()->default(0);
			$table->integer('total_meal')->unsigned()->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('total');
	}

}
