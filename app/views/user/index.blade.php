@extends('master')

<?php
    $pageTitle = $userInfo->getName();
    $address = $userInfo->getAddress();
?>

@section('content')


    <p>
        {{ $userInfo->getFirstName() }}
    </p>

    <p>
        {{ $userInfo->getLastName() }}
    </p>

    <p>
        {{ $userInfo->getPhoto() }}
    </p>

    @if(!is_null($userInfo->getPhones()))
        @foreach($userInfo->getPhones() as $phone)
            <p>
                {{ $phone->getPhoneType()." - ".$phone->getPhoneNumber()  }}
            </p>
        @endforeach
    @endif

    <p>
     @if(!is_null($address))
        {{ $address->getLine1() }} </br>
        {{ (strlen($address->getLine2()) > 0)?$address->getLine2():'' }}</br>
        {{ $address->getCity() }} </br>
        {{ $address->getState() }} </br>
        {{ $address->getCountry() }} </br>
        {{ $address->getZipcode() }} </br>
     @endif
    </p>
@stop