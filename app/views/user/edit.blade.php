@extends('master')

<?php
    $pageTitle = "Edit";
    //var_dump($user->getPhones()[0]->getPhoneNumber());
    //die();
    //var_dump($errors);
?>

@section('content')

{{ Form::open(array('url' => '/user/'.$user->getId(), 'method' => 'put', 'class' => 'userCreateForm')) }}

{{ Form::Label('firstName', 'First Name') }}
{{ Form::text('userFirstName', $user->getFirstName(), array('class' => 'userFirstNameText', 'placeholder' => 'John')) }}
@if($errors->has('firstName')) {{ $errors->first('firstName') }} @endif
<br>

{{ Form::Label('userLastName', 'Last Name') }}
{{ Form::text('userLastName', $user->getLastName(), array('class' => 'userlastNameText', 'placeholder' => 'Smith')) }}
@if($errors->has('lastName')) {{ $errors->first('lastName') }} @endif
<br>

{{ Form::Label('userEmail', 'Email') }}
{{ Form::text('userEmail', $user->getEmail(), array('class' => 'userEmailText', 'placeholder' => 'john@xyz.com')) }}
@if($errors->has('email')) {{ $errors->first('email') }} @endif
<br>

{{ Form::Label('userBirthday', 'Birthday') }}
{{ Form::text('userBirthday',$user->getBirthday(), array('class' => 'userBirthdayText', 'placeholder' => '1967-02-21')) }}
@if($errors->has('birthday')) {{ $errors->first('birthday') }} @endif
<br>

<?php

$homePhone = '';
$workPhone = '';

if(sizeof($user->getPhones()) > 0){
    foreach($user->getPhones() as $phones){
        $phoneType = $phones->getPhoneType();
        $phoneNumber = $phones->getPhoneNumber();

        if($phoneType == 'Home')
            $homePhone = $phoneNumber;
        else
            $workPhone = $phoneNumber;
    }
}



?>


{{ Form::Label('userHomePhone', 'Home Phone') }}
{{ Form::text('userHomePhone', $homePhone, array('class' => 'userHomePhoneText', 'placeholder' => '9864983652')) }}
@if($errors->has('homePhone')) {{ $errors->first('homePhone') }} @endif
<br>

{{ Form::Label('userWorkPhone', 'Work Phone') }}
{{ Form::text('userWorkPhone', $workPhone, array('class' => 'userWorkPhoneText', 'placeholder' => '9238465182')) }}
@if($errors->has('workPhone')) {{ $errors->first('workPhone') }} @endif
<br>



{{ Form::Label('userLine1', 'Apt/House No.') }}
{{ Form::text('userLine1', $user->getAddress()->getLine1(), array('class' => 'userLine1Text', 'placeholder' => '21B')) }}
@if($errors->has('line1')) {{ $errors->first('line1') }} @endif
<br>
{{ Form::Label('userLine2', 'Street Name') }}
{{ Form::text('userLine2', $user->getAddress()->getLine2(), array('class' => 'userLine2Text', 'placeholder' => 'Hoover Street')) }}
@if($errors->has('line2')) {{ $errors->first('line2') }} @endif
<br>
{{ Form::Label('userCity', 'City') }}
{{ Form::text('userCity', $user->getAddress()->getCity(), array('class' => 'userCityText', 'placeholder' => 'Los Angeles')) }}
@if($errors->has('city')) {{ $errors->first('city') }} @endif
<br>
{{ Form::Label('userState', 'State') }}
{{ Form::text('userState', $user->getAddress()->getState(), array('class' => 'userStateText', 'placeholder' => 'California')) }}
@if($errors->has('state')) {{ $errors->first('state') }} @endif
<br>
{{ Form::Label('userCountry', 'Country') }}
{{ Form::select('userCountry', $countries, $user->getAddress()->getCountry()) }}
@if($errors->has('country')) {{ $errors->first('country') }} @endif
<br>
{{ Form::Label('userZipcode', 'Zip Code') }}
{{ Form::text('userZipcode', $user->getAddress()->getZipcode(), array('class' => 'userZipcodeText', 'placeholder' => '90089')) }}
@if($errors->has('zipcode')) {{ $errors->first('zipcode') }} @endif
<br>

{{ Form::submit('Save Changes', array('class' => 'contactCreateSubmit')) }}
<div class="buttons" id="cancelButton">{{ HTML::link('user/'.$user->getId(), 'Cancel')  }}</div>
{{ Form::close() }}
@stop