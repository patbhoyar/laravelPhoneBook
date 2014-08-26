<?php


class AddressesTableSeeder extends Seeder {

	public function run()
	{
		Address::Create(array('user_id' => 1, 'line1' => '123 Main Street', 'city' => 'Los Angeles', 'state' => 'California', 'country' => 244, 'zipcode' => 90089));
        Address::Create(array('user_id' => 2, 'line1' => '223 Main Street', 'city' => 'Los Angeles', 'state' => 'California', 'country' => 244, 'zipcode' => 90089));
        Address::Create(array('user_id' => 3, 'line1' => '323 Main Street', 'city' => 'Los Angeles', 'state' => 'California', 'country' => 244, 'zipcode' => 90089));
        Address::Create(array('user_id' => 4, 'line1' => '423 Main Street', 'city' => 'Los Angeles', 'state' => 'California', 'country' => 244, 'zipcode' => 90089));
        Address::Create(array('user_id' => 5, 'line1' => '523 Main Street', 'city' => 'Los Angeles', 'state' => 'California', 'country' => 244, 'zipcode' => 90089));


	}

}