@extends('layout')
@section('content')
<div class="holder cancel-confirm">
	<h1>Are you sure you want to cancel?</h1>
	<p>You can renew at any time. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 	incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
	<form action="/unsubscribe/authorize" class="cancel-plan">
    	<input type="submit" class="normal" value="Cancel Plan">
	</form>
	<p><a class="back" href="/users/{{ $user->id }}">Return to my account</a></p>
</div>
@stop