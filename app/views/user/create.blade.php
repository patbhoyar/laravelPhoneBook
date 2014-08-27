@extends('master')

<?php
    $pageTitle  = "Add New Contact";
    $scripts    =  ['jquery', 'jqueryui/jquery-ui.min', 'datePicker', 'createUser'];
    $css        = ['styles', 'jquery-ui/jquery-ui.min'];
?>

@section('content')

{{ Form::open(array('url' => '/user', 'method' => 'post', 'class' => 'userCreateForm', 'files' => true)) }}

{{ Form::Label('userFirstName', 'First Name') }}
{{ Form::text('userFirstName','', array('class' => 'userFirstNameText', 'placeholder' => 'John')) }}
@if($errors->has('firstName')) {{ $errors->first('firstName') }} @endif
<br>

{{ Form::Label('userLastName', 'Last Name') }}
{{ Form::text('userLastName','', array('class' => 'userlastNameText', 'placeholder' => 'Smith')) }}
@if($errors->has('lastName')) {{ $errors->first('lastName') }} @endif
<br>

{{ Form::Label('userEmail', 'Email') }}
{{ Form::text('userEmail','', array('class' => 'userEmailText', 'placeholder' => 'john@xyz.com')) }}
@if($errors->has('email')) {{ $errors->first('email') }} @endif
<br>

{{ Form::Label('userBirthday', 'Birthday') }}
{{ Form::text('userBirthday','', array('class' => 'userBirthdayText', 'placeholder' => '1967-02-21', 'id' => 'datepicker')) }}
@if($errors->has('birthday')) {{ $errors->first('birthday') }} @endif
<br>

<div id="photoContainer">
    {{ HTML::image('images/userpics/profilepic.jpeg', $alt="DRCSports", $attributes = array()) }}
    <div class="buttons" id="uploadProfilePic">Add User Image</div>
    {{ Form::file('profilePic', array('id' => 'fileUpload')) }}
    <div id="picName"></div>
</div>



{{ Form::Label('userHomePhone', 'Home Phone') }}
{{ Form::text('userHomePhone', '', array('class' => 'userHomePhoneText', 'placeholder' => '9864983652')) }}
@if($errors->has('homePhone')) {{ $errors->first('homePhone') }} @endif
<br>

{{ Form::Label('userWorkPhone', 'Work Phone') }}
{{ Form::text('userWorkPhone', '', array('class' => 'userWorkPhoneText', 'placeholder' => '9238465182')) }}
@if($errors->has('workPhone')) {{ $errors->first('workPhone') }} @endif
<br>


{{ Form::Label('userLine1', 'Apt/House No.') }}
{{ Form::text('userLine1', '', array('class' => 'userLine1Text', 'placeholder' => '21B')) }}
@if($errors->has('line1')) {{ $errors->first('line1') }} @endif
<br>

{{ Form::Label('userLine2', 'Street Name') }}
{{ Form::text('userLine2', '', array('class' => 'userLine2Text', 'placeholder' => 'Hoover Street')) }}
@if($errors->has('line2')) {{ $errors->first('line2') }} @endif
<br>

{{ Form::Label('userCity', 'City') }}
{{ Form::text('userCity', '', array('class' => 'userCityText', 'placeholder' => 'Los Angeles')) }}
@if($errors->has('city')) {{ $errors->first('city') }} @endif
<br>

{{ Form::Label('userState', 'State') }}
{{ Form::text('userState', '', array('class' => 'userStateText', 'placeholder' => 'California')) }}
@if($errors->has('state')) {{ $errors->first('state') }} @endif
<br>

{{ Form::Label('userCountry', 'Country') }}
{{ Form::select('userCountry', $countries, 244) }}
@if($errors->has('country')) {{ $errors->first('country') }} @endif
<br>

{{ Form::Label('userZipcode', 'Zip Code') }}
{{ Form::text('userZipcode', '', array('class' => 'userZipcodeText', 'placeholder' => '90089')) }}
@if($errors->has('zipcode')) {{ $errors->first('zipcode') }} @endif
<br>

{{ Form::submit('Create Contact', array('class' => 'contactCreateSubmit')) }}
{{ Form::close() }}
@stop