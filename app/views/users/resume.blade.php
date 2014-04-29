@extends('layout')
@section('content')

	<div class="holder resume">
		<h1>Resume Your Subscription</h1>
		<p>Please provide credit card information for this subscription.</p>
		@include('forms.billing', ['resume' => true, 'plan', $plan])
		<aside class="right-content">
			<div class="you-selected">
				<strong class="title"><span><span class="name-text">{{ $plan->name }}</span> (<span class="price-text">${{ $plan->amount / 100 }}</span>/mo.)</span></strong>
				<div class="photos-num">
					<div class="img-wrap">
						<img src="/assets/images/icon01.png" width="73" height="45" alt="icon">
					</div>
					<span>x <span class="quantity-text">{{ $plan->metadata->prints_per_month }}</span></span>
				</div>
			</div>
			<div class="secure-checkout">
				<h3>Secure Checkout</h3>
				<p>That means we use the highest level of SSL encryption.</p>
				<a href="#"><img src="/assets/images/verisign.png" width="122" height="62" alt="verisign"></a>
			</div>
		</aside>
	</div>

@stop