<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::Create(array('firstName' => 'John', 'lastName' => 'AppleSeed', 'email' => 'john@gmail.com'));
        User::Create(array('firstName' => 'Sloan', 'lastName' => 'AppleSeed', 'email' => 'sloan@gmail.com'));
        User::Create(array('firstName' => 'Mike', 'lastName' => 'AppleSeed', 'email' => 'mike@gmail.com'));
        User::Create(array('firstName' => 'Susan', 'lastName' => 'AppleSeed', 'email' => 'susan@gmail.com'));
        User::Create(array('firstName' => 'Rick', 'lastName' => 'AppleSeed', 'email' => 'rick@gmail.com'));
	}

}