<?php

class TotalTableSeeder extends Seeder {

	public function run()
	{
		$total =[];

		DB::table('total')->insert($total);
	}
}