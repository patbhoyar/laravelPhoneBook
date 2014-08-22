@extends('master')

<?php
$pageTitle = "Contacts";
?>

@section('content')

@foreach($users as $user)
<div class="userContainer">
    {{ HTML::link('/user/'.$user->id, $user->firstName." ".$user->lastName) }}
</div>

@endforeach

@stop