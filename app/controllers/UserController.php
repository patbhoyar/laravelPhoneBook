<?php

use lib\Classes\User as UserClass;
use lib\Classes\Phone as PhoneClass;
use lib\Classes\Address as AddressClass;


class UserController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 *  Response
	 */
	public function index()
	{
        $users = User::all();
        return View::make('user.index', array('users' => $users));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $rules = array(
            'firstName' =>  'required|alpha',
            'lastName'  =>  'required|alpha',
            'homePhone' =>  'digits_between:6,10',
            'workPhone' =>  'digits_between:6,10',
            'line1'     =>  'required|alpha_num',
            'line2'     =>  'required',
            'city'      =>  'required|alpha',
            'state'     =>  'required|alpha',
            'country'   =>  'required|alpha',
            'zipcode'   =>  'digits_between:5-7'
        );

        $userData = array(
            'firstName' =>  Input::get('userFirstName'),
            'lastName'  =>  Input::get('userLastName'),
            'homePhone' =>  Input::get('userHomePhone', NULL),
            'workPhone' =>  Input::get('userWorkPhone', NULL),
            'line1'     =>  Input::get('userLine1'),
            'line2'     =>  Input::get('userLine2'),
            'city'      =>  Input::get('userCity'),
            'state'     =>  Input::get('userState'),
            'country'   =>  Input::get('userCountry'),
            'zipcode'   =>  Input::get('userZipcode', NULL)
        );

        $validator = Validator::make($userData, $rules);

        if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::to('user/create')->withErrors($messages);
        }

        $user = new User();
        $user->firstName = $userData['firstName'];
        $user->lastName = $userData['lastName'];
        $user->photo = 'abc.jpg';
        $user->save();
        $userId = $user->id;

        self::savePhone($userId, 'Home', $userData['homePhone']);
        self::savePhone($userId, 'Work', $userData['workPhone']);

        self::saveAddress($userId, $userData['line1'],  $userData['line2'], $userData['city'], $userData['state'], $userData['country'], $userData['zipcode']);
        return Redirect::to('user/'.$userId);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $user = User::find($id);

        //Get Address of the User
        $userAddress = User::find($id)->addresses;
        if(!is_null($userAddress)){
            $address = new AddressClass();
            $address->setLine1($userAddress->line1);
            $address->setLine2($userAddress->line2);
            $address->setCity($userAddress->city);
            $address->setState($userAddress->state);
            $address->setCountry($userAddress->country);
            $address->setZipcode($userAddress->zipcode);
        }else{
            $address = NULL;
        }

        //Get all Phones of the User
        $userPhones = User::find($id)->phones;
        if(!is_null($userPhones)){
            $phones = array();
            foreach($userPhones as $phone){
                $p = new PhoneClass();
                $p->setPhoneNumber($phone->phoneNumber);
                $p->setPhoneType($phone->phoneType);
                array_push($phones, $p);
            }
        }else{
            $phones = NULL;
        }

        //Set User Object
        $myUser = new UserClass();
        $myUser->setFirstName($user->firstName);
        $myUser->setLastName($user->lastName);
        $myUser->setPhoto($user->photo);
        $myUser->setAddress($address);
        $myUser->setPhones($phones);

        return View::make('user.index', array('userInfo' => $myUser));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('user.edit', array('user' => User::find($id)));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public static function savePhone($userId, $phoneType, $phoneNumber){
        $phone = new Phone();
        $phone->user_id = $userId;
        $phone->phoneType = $phoneType;
        $phone->phoneNumber = $phoneNumber;
        $phone->save();
    }

    public function saveAddress($userId, $userLine1, $userLine2, $userCity, $userState, $userCountry, $userZipcode){
        $address            = new Address();
        $address->user_id   = $userId;
        $address->line1     = $userLine1;
        $address->line2     = $userLine2;
        $address->city      = $userCity;
        $address->state     = $userState;
        $address->country   = $userCountry;
        $address->zipcode   = $userZipcode;
        $address->save();
    }

}