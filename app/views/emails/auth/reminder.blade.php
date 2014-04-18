@extends('emails.layout')
@section('content')

	<h1>Reset Your Password</h1>

	<p>
		To reset your password, complete this form: {{ URL::to('password/reset', array($token)) }}.
	</p>

@stop