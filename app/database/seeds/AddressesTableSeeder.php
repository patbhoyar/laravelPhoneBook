<?php


class AddressesTableSeeder extends Seeder {

	public function run()
	{
		Address::Create(array('user_id' => 1, 'line1' => '123', 'line2' => 'Main Street', 'city' => 'Los Angeles', 'state' => 'California', 'country' => 244, 'zipcode' => 90089));
        Address::Create(array('user_id' => 2, 'line1' => '223', 'line2' => 'Main Street', 'city' => 'Los Angeles', 'state' => 'California', 'country' => 244, 'zipcode' => 90089));
        Address::Create(array('user_id' => 3, 'line1' => '338', 'line2' => 'Main Street', 'city' => 'Los Angeles', 'state' => 'California', 'country' => 244, 'zipcode' => 90089));
        Address::Create(array('user_id' => 4, 'line1' => '21', 'line2' => 'Main Street', 'city' => 'Los Angeles', 'state' => 'California', 'country' => 244, 'zipcode' => 90089));
        Address::Create(array('user_id' => 5, 'line1' => '53', 'line2' => 'Main Street', 'city' => 'Los Angeles', 'state' => 'California', 'country' => 244, 'zipcode' => 90089));


	}

}