@extends('master')

<?php
    $pageTitle = "Edit";
    //var_dump($user);
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


{{ Form::Label('userHomePhone', 'Home Phone') }}
{{ Form::text('userHomePhone', $user->getPhones()[0]->getPhoneNumber(), array('class' => 'userHomePhoneText', 'placeholder' => '9864983652')) }}
@if($errors->has('homePhone')) {{ $errors->first('homePhone') }} @endif
<br>

{{ Form::Label('userWorkPhone', 'Work Phone') }}
{{ Form::text('userWorkPhone', $user->getPhones()[1]->getPhoneNumber(), array('class' => 'userWorkPhoneText', 'placeholder' => '9238465182')) }}
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

{{ Form::submit('Create Contact', array('class' => 'contactCreateSubmit')) }}
{{ Form::close() }}
@stop