<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		$roles = array(
			array('name' =>'Admin'),
			['name'	=>	'Manager'],
			array('name' =>'User')
		);

		DB::table('roles')->insert($roles);
	}
}