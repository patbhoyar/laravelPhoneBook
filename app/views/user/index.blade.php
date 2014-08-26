@extends('master')

<?php
    $pageTitle = $userInfo->getName();
    $button = 'edit';
    $address = $userInfo->getAddress();
    $bday = date("jS F, Y", strtotime($userInfo->getBirthday()));
?>

@section('content')

<div id="userDataContainer">
    <div id="userNameContainer">{{ $userInfo->getFirstName()." ".$userInfo->getLastName() }}</div>
    <div id="emailsTitle">Emails:</div>
    <div id="emailsContainer">
        <div id="userEmailContainer">{{ $userInfo->getEmail() }}</div>
    </div>
    <div id="birthdayTitle">Birthday:</div>
    <div id="birthdayContainer">
        <div id="userBirthdayContainer">{{ $bday }}</div>
    </div>
    {{ HTML::image('images/userpics/'.$userInfo->getPhoto(), $alt="DRCSports", $attributes = array()) }}

    @if($userInfo->getPhones()[0]->getPhoneNumber() != 0 && $userInfo->getPhones()[1]->getPhoneNumber() != 0)
    <div id="phonesTitle">Contact Numbers:</div>
    <div id="phonesContainer">
        @foreach($userInfo->getPhones() as $phone)
            @if($phone->getPhoneNumber() != 0)
                {{ $phone->getPhoneType()." - ".$phone->getPhoneNumber()  }}</br>
            @endif
        @endforeach
    </div>
    @endif

    <div id="addressTitle">Address:</div>
    <div id="addressContainer">
        @if(!is_null($address))
        {{ $address->getLine1() }},
        {{ (strlen($address->getLine2()) > 0)?$address->getLine2():'' }}</br>
        {{ $address->getCity() }}, {{ $address->getState() }}, </br>
        {{ $countries[$address->getCountry()] }} </br>
        {{ $address->getZipcode() }} </br>
        @endif
    </div>

</div>

@stop