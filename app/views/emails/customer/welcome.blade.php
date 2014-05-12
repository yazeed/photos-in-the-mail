@extends('emails.layout')
@section('content')

	<h1 style="font-size: 30px;">Welcome to Photos in the Mail</h1>

	<p>Your registration date is {{ $dates[0] }} and your fulfillment day will be the {{ $dates[1] }} of every month.</p>

	<p>Put simply, any pictures you email us between the {{ $dates[2] }} day of one month to the {{ $dates[2] }} day of the next month will be shipped to you by the {{ $dates[3] }} of each month!</p>

	<p>So, start emailing us those pictures today! Any pictures you send us between {{ $dates[4] }} and {{ $dates[5] }} will be sent to you by {{ $dates[6] }}!</p>

	<p>Here are some other things you may want to know:</p>

	<p>Send your pictures using the same email you signed up with.</p>

	<p>You can change your plan, mailing address, or billing information anytime at <a href="mailto:photosinthemail.com">photosinthemail.com</a>.</p>


@stop