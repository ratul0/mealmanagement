<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$users = array(
			array(
				'username'  =>'ornob',
				'email'      =>'ornob@gmail.com',
				'password'   => Hash::make('ornob'),
				'role_id'    => 3,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			),
			array(
				'username'  =>'adnan',
				'email'      =>'adnan@gmail.com',
				'password'   => Hash::make('adnan'),
				'role_id'    => 3,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			),
			array(
				'username'  =>'sohan',
				'email'      =>'sohan@gmail.com',
				'password'   => Hash::make('sohan'),
				'role_id'    => 3,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			),
			array(
				'username'  =>'tuhin',
				'email'      =>'tuhin@gmail.com',
				'password'   => Hash::make('tuhin'),
				'role_id'    => 3,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			),
			array(
				'username'  =>'ratul',
				'email'      =>'ratul@gmail.com',
				'password'   => Hash::make('ratul'),
				'role_id'    => 1,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			),
			array(
				'username'  =>'orgho',
				'email'      =>'orgho@gmail.com',
				'password'   => Hash::make('orgho'),
				'role_id'    => 3,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			),
			array(
				'username'  =>'jubaer',
				'email'      =>'jubaer@gmail.com',
				'password'   => Hash::make('jubaer'),
				'role_id'    => 3,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			),
			array(
				'username'  =>'sazzad',
				'email'      =>'sazzad@gmail.com',
				'password'   => Hash::make('sazzad'),
				'role_id'    => 3,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			),
			array(
				'username'  =>'rayhan',
				'email'      =>'rayhan@gmail.com',
				'password'   => Hash::make('rayhan'),
				'role_id'    => 3,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			),
			array(
				'username'  =>'mukul',
				'email'      =>'mukul@gmail.com',
				'password'   => Hash::make('mukul'),
				'role_id'    => 3,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			),
			array(
				'username'  =>'chayon',
				'email'      =>'chayon@gmail.com',
				'password'   => Hash::make('chayon'),
				'role_id'    => 3,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			)
		);

		DB::table('users')->insert($users);
	}
}