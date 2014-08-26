<?php

use lib\Classes\User as UserClass;
use lib\Classes\Phone as PhoneClass;
use lib\Classes\Address as AddressClass;
use lib\Classes\Util as UtilClass;


class UserController extends \BaseController {

    private $rules = array(
        'firstName' =>  'required|alpha',
        'lastName'  =>  'required|alpha',
        'email'     =>  'email',
        'homePhone' =>  'digits_between:6,10',
        'workPhone' =>  'digits_between:6,10',
        'line1'     =>  'required|alpha_num',
        'line2'     =>  'required',
        'city'      =>  'required',
        'state'     =>  'required|alpha',
        'zipcode'   =>  'digits_between:5,7'
    );

	/**
	 * Display a listing of the resource.
	 *
	 *  Response
	 */
	public function index()
	{
        $users = User::orderBy('lastName', 'asc')->get();
        return View::make('user.index', array('users' => $users));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create', array('countries' => UtilClass::allCountries()));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $userData = self::getUserInput();
        $validator = Validator::make($userData, $this->rules);

        if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::to('user/create')->withErrors($messages)->withInput();
        }

        $userId = self::saveUserData($userData);
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
        $myUser = self::getUserData($id);

        return View::make('user.index', array('userInfo' => $myUser, 'countries' => UtilClass::allCountries()));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $myUser = self::getUserData($id);
		return View::make('user.edit', array('user' => $myUser, 'countries' => UtilClass::allCountries()));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $userData = self::getUserInput();
        $validator = Validator::make($userData, $this->rules);

        if($validator->fails()){
            $messages = $validator->messages();
            //var_dump($messages);
            //dd($userData);

            return Redirect::to('user/'.$id.'/edit')->withErrors($messages)->withInput();
        }

        self::saveUserData($userData, $id);
        return Redirect::to('user/'.$id);
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

    private static function createPhoneObject($userId, $phoneType, $phoneNumber){
        $phone = new Phone();
        $phone->user_id = $userId;
        $phone->phoneType = $phoneType;
        $phone->phoneNumber = $phoneNumber;
        $phone->save();
    }

    private static function savePhone($userId, $homePhone, $workPhone, $oldUser){

        if(!$oldUser){
            self::createPhoneObject($userId, 'Home', $homePhone);
            self::createPhoneObject($userId, 'Work', $workPhone);
        }else{
            $phone = Phone::where('user_id', '=', $userId)->where('phoneType', '=', 'Home')->first();
            if(is_null($phone)){
                self::createPhoneObject($userId, 'Home', $homePhone);
            }else{
                $phone->phoneNumber = $homePhone;
                $phone->save();
            }

            $phone = Phone::where('user_id', '=', $userId)->where('phoneType', '=', 'Work')->first();
            if(is_null($phone)){
                self::createPhoneObject($userId, 'Work', $workPhone);
            }else{
                $phone->phoneNumber = $workPhone;
                $phone->save();
            }
        }
    }

    private static function saveAddress($userId, $userLine1, $userLine2, $userCity, $userState, $userCountry, $userZipcode, $oldUser){

        if(!$oldUser){
            $address            = new Address();
            $address->user_id   = $userId;
        }else{
            $address = Address::where('user_id', '=', $userId)->first();
        }

        $address->line1     = $userLine1;
        $address->line2     = $userLine2;
        $address->city      = $userCity;
        $address->state     = $userState;
        $address->country   = $userCountry;
        $address->zipcode   = $userZipcode;
        $address->save();
    }

    private static function saveUserData($userData, $id = NULL){

        $oldUser = TRUE;

        if(is_null($id)){
            $user = new User();
            $oldUser = FALSE;//So as to not create new Phones for a user, every time an edit is made
        }else{
            $user = User::find($id);
        }
        $user->firstName = $userData['firstName'];
        $user->lastName = $userData['lastName'];
        $user->email = $userData['email'];
        $user->photo = 'abc.jpg';
        $user->save();
        $id = $user->id;

        self::savePhone($id, $userData['homePhone'], $userData['workPhone'], $oldUser);

        self::saveAddress($id, $userData['line1'],  $userData['line2'], $userData['city'], $userData['state'], $userData['country'], $userData['zipcode'], $oldUser);
        return $id;
    }

    private static function getUserData($id){
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
        $myUser->setId($id);
        $myUser->setFirstName($user->firstName);
        $myUser->setLastName($user->lastName);
        $myUser->setEmail($user->email);
        $myUser->setPhoto($user->photo);
        $myUser->setAddress($address);
        $myUser->setPhones($phones);

        return $myUser;
    }

    private static function getUserInput(){

        return array(
            'firstName' =>  Input::get('userFirstName'),
            'lastName'  =>  Input::get('userLastName'),
            'email'     =>  Input::get('userEmail', NULL),
            'homePhone' =>  Input::get('userHomePhone', NULL),
            'workPhone' =>  Input::get('userWorkPhone', NULL),
            'line1'     =>  Input::get('userLine1'),
            'line2'     =>  Input::get('userLine2'),
            'city'      =>  Input::get('userCity'),
            'state'     =>  Input::get('userState'),
            'country'   =>  Input::get('userCountry'),
            'zipcode'   =>  Input::get('userZipcode', NULL)
        );

    }

}