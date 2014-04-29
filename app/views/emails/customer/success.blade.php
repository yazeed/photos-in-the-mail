@extends('emails.layout')
@section('content')

<h3>Payment Successful</h3>

<p>Your automatic payment of ${{ $amount }} was successfully charged to your card ending in {{ $last_four }}.</p>

@stop
