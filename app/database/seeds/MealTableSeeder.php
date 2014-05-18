<?php

class MealTableSeeder extends Seeder {

	public function run()
	{
		$meals = [
			[
				'user_id'      =>	1,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			],
			[
				'user_id'      =>	2,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			],
			[
				'user_id'      =>	3,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			],
			[
				'user_id'      =>	4,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			],
			[
				'user_id'      =>	5,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			],
			[
				'user_id'      =>	6,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			],
			[
				'user_id'      =>	7,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			],
			[
				'user_id'      =>	8,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			],
			[
				'user_id'      =>	9,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			],
			[
				'user_id'      =>	10,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			],
			[
				'user_id'      =>	11,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			]
		];
				
		

		DB::table('meal')->insert($meals);
	}
}