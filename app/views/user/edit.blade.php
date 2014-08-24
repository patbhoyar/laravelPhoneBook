@extends('master')

<?php
    $pageTitle = "Edit";
?>

@section('content')

{{ Form::model($user, array('route' => array('user.update', $user->id), 'class' => 'userCreateForm')) }}

{{ Form::Label('firstName', 'First Name') }}
{{ Form::text('firstName','', array('class' => 'userFirstNameText', 'placeholder' => 'John')) }} <br>
{{ Form::Label('userLastName', 'Last Name') }}
{{ Form::text('userLastName','', array('class' => 'userlastNameText', 'placeholder' => 'Smith')) }} <br>


{{ Form::Label('userHomePhone', 'Home Phone') }}
{{ Form::text('userHomePhone', '', array('class' => 'userHomePhoneText', 'placeholder' => '9864983652')) }} <br>
{{ Form::Label('userWorkPhone', 'Work Phone') }}
{{ Form::text('userWorkPhone', '', array('class' => 'userWorkPhoneText', 'placeholder' => '9238465182')) }} <br>


{{ Form::Label('userLine1', 'Apt/House No.') }}
{{ Form::text('userLine1', '', array('class' => 'userLine1Text', 'placeholder' => '21B')) }} <br>
{{ Form::Label('userLine2', 'Street Name') }}
{{ Form::text('userLine2', '', array('class' => 'userLine2Text', 'placeholder' => 'Hoover Street')) }} <br>
{{ Form::Label('userCity', 'City') }}
{{ Form::text('userCity', '', array('class' => 'userCityText', 'placeholder' => 'Los Angeles')) }} <br>
{{ Form::Label('userState', 'State') }}
{{ Form::text('userState', '', array('class' => 'userStateText', 'placeholder' => 'California')) }} <br>
{{ Form::Label('userCountry', 'Country') }}
{{ Form::text('userCountry', '', array('class' => 'userCountryText', 'placeholder' => 'Country')) }} <br>
{{ Form::Label('userZipcode', 'Zip Code') }}
{{ Form::text('userZipcode', '', array('class' => 'userZipcodeText', 'placeholder' => '90089')) }} <br>

{{ Form::submit('Create Contact', array('class' => 'contactCreateSubmit')) }}
{{ Form::close() }}
@stop