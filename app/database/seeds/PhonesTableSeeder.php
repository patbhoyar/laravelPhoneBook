<?php

class PhonesTableSeeder extends Seeder {

	public function run()
	{
		Phone::Create(array('user_id' => 1, 'phoneNumber' => '2136783429'));
        Phone::Create(array('user_id' => 1, 'phoneType' => 'Home', 'phoneNumber' => '2397329398'));
        Phone::Create(array('user_id' => 2, 'phoneNumber' => '2136783423'));
        Phone::Create(array('user_id' => 2, 'phoneType' => 'Work', 'phoneNumber' => '2123287429'));
        Phone::Create(array('user_id' => 4, 'phoneNumber' => '4423283429'));
	}

}