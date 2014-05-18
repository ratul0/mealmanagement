<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('RolesTableSeeder');
		 $this->call('UsersTableSeeder');
		 $this->call('PaymentTableSeeder');
		 $this->call('MealTableSeeder');		 
		 $this->call('BazarTableSeeder');
		 $this->call('TotalTableSeeder');

	}

}