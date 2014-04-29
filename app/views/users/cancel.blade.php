@extends('layout')
@section('content')
<div class="holder cancel-confirm">
	<h1>Cancel Subscription</h1>
	<p>We’re sorry to hear that you don’t wish to receive Photos in the Mail anymore. Please remember that you can downgrade your plan at anytime, but if you still want to cancel simply click the button below.</p>
	<form action="/unsubscribe/authorize" class="cancel-plan">
    	<input type="submit" class="normal" value="Submit">
	</form>
	<p><a class="back" href="/users/{{ $user->id }}">Return to my account</a></p>
</div>
@stop