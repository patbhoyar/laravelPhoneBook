<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::Create(array('firstName' => 'John', 'lastName' => 'AppleSeed', 'photo' => 'abc.jpg'));
        User::Create(array('firstName' => 'Sloan', 'lastName' => 'AppleSeed', 'photo' => 'def.jpg'));
        User::Create(array('firstName' => 'Mike', 'lastName' => 'AppleSeed', 'photo' => 'ghi.jpg'));
        User::Create(array('firstName' => 'Susan', 'lastName' => 'AppleSeed', 'photo' => 'jkl.jpg'));
        User::Create(array('firstName' => 'Rick', 'lastName' => 'AppleSeed', 'photo' => 'mno.jpg'));
	}

}