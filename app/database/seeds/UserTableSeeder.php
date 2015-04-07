<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('user')->delete();
		User::create(array(
			'username' => 'admin',
			'password' => Hash::make('admin'),
			'name' => 'Master',
			'role' => 'admin',
		));
	}

}