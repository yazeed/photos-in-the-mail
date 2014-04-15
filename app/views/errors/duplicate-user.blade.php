@extends('layout')
@section('content')
<div class="holder">
    <h1 class="error-msg">Another user has already registered with {{ $email }}.</h1>
    <p>If you have registered already please <a href="/login">login</a>. If you need to reset your password, <a href="/password/remind">click here.</a></p>
</div>
@stop