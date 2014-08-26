<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::Create(array('firstName' => 'John', 'lastName' => 'AppleSeed', 'email' => 'john@gmail.com', 'birthday' => '1965-07-12'));
        User::Create(array('firstName' => 'Sloan', 'lastName' => 'AppleSeed', 'email' => 'sloan@gmail.com', 'birthday' => '1969-03-18'));
        User::Create(array('firstName' => 'Mike', 'lastName' => 'AppleSeed', 'email' => 'mike@gmail.com', 'birthday' => '1986-09-01'));
        User::Create(array('firstName' => 'Susan', 'lastName' => 'AppleSeed', 'email' => 'susan@gmail.com', 'birthday' => '1989-02-09'));
        User::Create(array('firstName' => 'Rick', 'lastName' => 'AppleSeed', 'email' => 'rick@gmail.com', 'birthday' => '1992-12-19'));
	}

}