@extends('master')

<?php
    $pageTitle  = "Contacts";
    $scripts    = ['jquery', 'menu'];
    $css        = ['styles'];
?>

@section('content')

@foreach($users as $user)
<div class="userContainer">
    {{ HTML::link('/user/'.$user->id, $user->lastName.", ".$user->firstName) }}
</div>

@endforeach

@stop