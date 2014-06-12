<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create([
            'email' => 'david@spookstudio.com',
            'password' => Hash::make('password'),
		]);

        User::create([
            'email' => 'dttownsend@gmail.com',
            'password' => Hash::make('password'),
        ]);
	}

}