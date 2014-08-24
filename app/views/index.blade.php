@extends('master')

<?php
$pageTitle = "Contacts";
?>

@section('content')

@foreach($users as $user)
<div class="userContainer">
    {{ HTML::link('/user/'.$user->id, $user->lastName.", ".$user->firstName) }}
</div>

@endforeach

@stop