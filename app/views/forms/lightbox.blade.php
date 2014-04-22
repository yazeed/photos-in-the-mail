<!-- cotain lightbox -->
<div class="popup-holder">
	<div id="popup4" class="lightbox shipping-info">
		<div class="left-content">
			<h2>Enter Shipping Info</h2>
			<!-- shipping-from -->
			{{ Form::open(['class' => 'shipping-form']) }}
				<fieldset>
					<div class="row">
						<div class="first-name">
							<div class="label-wrap">
								<label for="first-name">First Name:</label>
								<span>*</span>
							</div>
							<input class="required" id="first-name" type="text" name="f-name">
						</div>
						<div class="last-name">
							<div class="label-wrap">
								<label for="last-name">Last Name:</label>
								<span>*</span>
							</div>
							<input class="required" id="last-name" type="text" name="l-name">
						</div>
						<input type="hidden" name="name">
					</div>
					<div class="row">
						<div class="email-address">
							<div class="label-wrap">
								<label for="email-id">Email Address:</label>
								<span>*</span>
							</div>
							<input class="required-email" id="email-id" type="email" name="stripeEmail">
						</div>
		                <div class="password">
		                    <div class="label-wrap">
		                        <label for="password">Choose a password:</label>
		                        <span>*</span>
		                    </div>
		                    <input class="required-password" type="password" name="password">
		                </div>
					</div>
					<div class="row">
						<div class="label-wrap">
							<label for="shipping-address">Shipping Address:</label>
							<span>*</span>
						</div>
						<input class="shipping-addr required" id="shipping-address" type="text" name="address_line1">
					</div>
					<div class="row">
						<div class="city">
							<div class="label-wrap">
								<label for="city">City:</label>
								<span>*</span>
							</div>
							<input class="required" id="city" type="text" name="address_city">
						</div>
						<div class="state">
							<div class="label-wrap">
								<label for="state">State:</label>
								<span>*</span>
							</div>
							<input class="required" id="state" type="text" name="address_state">
						</div>
						<div class="zip">
							<div class="label-wrap">
								<label for="zip">Zip:</label>
								<span>*</span>
							</div>
							<input class="required-number" id="zip" type="text" name="address_zip">
						</div>
					</div>
					<div class="button-holder">
						<a href="javascript:void(0);" data-href="#popup7" class="continue lightbox">Continue &gt;</a>
						<span class="mask"></span>
					</div>
				</fieldset>
			{{ Form::close() }}
			<!-- cotain lightbox -->
			<div class="popup-holder">
				<div id="popup7" class="lightbox billing-info">
					<div class="left-content">
						<h2>Enter Billing Info</h2>
						<!-- billing-form -->
    					{{ Form::open(['route' => 'orders.store', 'method' => 'post', 'class' => 'billing-form']) }}
        					<div class="payment-errors"></div>
							<fieldset>
								<div class="row">
									<div class="label-wrap">
										<label for="cc-num">Credit Card Number:</label>
										<span>*</span>
									</div>
									<div class="input-wrap">
										<input class="required-number" id="cc-num" type="text" data-stripe="number">
										<ul class="cc-list">
											<li class="active">
												<a href="#">
													<img src="/assets/images/visa2.jpg" width="32" height="21" alt="visa-card">
													<span class="hover-state"></span>
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/assets/images/master-card2.jpg" width="32" height="21" alt="master-card">
													<span class="hover-state"></span>
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/assets/images/discover.jpg" width="32" height="21" alt="discover-card">
													<span class="hover-state"></span>
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/assets/images/american-express.jpg" width="32" height="21" alt="american-experss">
													<span class="hover-state"></span>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="row">
									<div class="expire-month">
										<label for="month-expire">Expiration Month:</label>
										<select class="required-select" id="month-expire" data-stripe="exp-month">
											<option>Expiration Month</option>
											<option value="01">01 - January</option>
											<option value="02">02 - February</option>
											<option value="03">03 - March</option>
											<option value="04">04 - April</option>
											<option value="05">05 - May</option>
											<option value="06">06 - June</option>
											<option value="07">07 - July</option>
											<option value="08">08 - August</option>
											<option value="09">09 - September</option>
											<option value="10">10 - October</option>
											<option value="11">11 - November</option>
											<option value="12">12 - December</option>
										</select>
									</div>
									<div class="expire-year">
										<label for="year-expire">Expiration Year:</label>
										<select class="required-select" id="year-expire" data-stripe="exp-year">
											<option>Expiration Year</option>
											<option value="2014">2014</option>
											<option value="2015">2015</option>
											<option value="2016">2016</option>
											<option value="2017">2017</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="cvc-code">
										<div class="label-wrap">
											<label for="cvc">CVC Code:</label>
											<span>*</span>
										</div>
										<input class="required-number" id="cvc" type="text" data-stripe="cvc">
										<span>It’s the 3-digit code on the back</span>
									</div>
									<div class="billing-addr">
										<span class="title">Billing Address?</span>
										<div class="shipping-same">
											<input class="slide-opener" data-slide="#billing-address" id="checkbox1" type="checkbox" checked="checked" name="shippingSameAsBilling">
											<label for="checkbox1">Same as shipping address</label>
										</div>
									</div>
								</div>
								<div id="billing-address" class="billing-address">
									<div class="slide-holder">
										<h2>Billing Address</h2>
										<div class="row">
											<div class="first-name">
												<div class="label-wrap">
													<label for="f-name1">First Name:</label>
													<span>*</span>
												</div>
												<input class="required" id="f-name1" type="text" name="f-name1">
											</div>
											<div class="last-name">
												<div class="label-wrap">
													<label for="l-name1">Last Name:</label>
													<span>*</span>
												</div>
												<input class="required" id="l-name1" type="text" name="l-name1">
											</div>
											<input type="hidden" name="stripeBillingName">
										</div>
										<div class="row">
											<div class="label-wrap">
												<label for="shipping-add1">Street Address</label>
												<span>*</span>
											</div>
											<input class="required shipping-addr" id="shipping-add1" type="text" name="stripeBillingAddressLine1">
										</div>
										<div class="row">
											<div class="city">
												<div class="label-wrap">
													<label for="city7">City</label>
													<span>*</span>
												</div>
												<input class="required" id="city7" type="text" name="stripeBillingAddressCity">
											</div>
											<div class="state">
												<div class="label-wrap">
													<label for="state7">State:</label>
													<span>*</span>
												</div>
												<input class="required" id="state7" type="text" name="stripeBillingAddressState">
											</div>
											<div class="zip">
												<div class="label-wrap">
													<label for="zip7">Zip:</label>
													<span>*</span>
												</div>
												<input class="required-number" id="zip7" type="text" name="stripeBillingAddressZip">
											</div>
										</div>
									</div>
								</div>
								<div class="button-holder">
									<input type="submit" value="Complete order &gt;">
									<span class="mask"></span>
								</div>
							</fieldset>
							<input type="hidden" name="plan">
						{{ Form::close() }}
						<div class="terms">
							<p>By clicking “Complete Order,” you confirm that you accept the <a href="legal" target="_blank">Terms of Service</a> and that your plan will automatically renew monthly  and your credit card will automatically be charged the applicable monthly subscription fee and shipping and handling fees until you cancel.</p>
						</div>
					</div>
					<aside class="right-content">
						<div class="you-selected">
							<strong class="title">You selected: <span><span class="name-text">Album</span>(<sup>$</sup><span class="price-text">9</span>/mo.)</span></strong>
							<div class="photos-num">
								<div class="img-wrap">
									<img src="/assets/images/icon01.png" width="73" height="45" alt="icon">
								</div>
								<span>x <span class="quantity-text">5</span></span>
							</div>
						</div>
						<div class="secure-checkout">
							<h3>Secure Checkout</h3>
							<p>That means we use the highest level of SSL encryption.</p>
							<a href="#"><img src="/assets/images/verisign.png" width="122" height="62" alt="verisign"></a>
						</div>
					</aside>
					<a href="#" class="close">Close X</a>
					<a href="#popup4" class="go-back lightbox"> &lt;Go back to Shipping Info</a>
				</div>
			</div>
		</div>
		<!-- lightbox sidebar -->
		<aside class="right-content">
			<div class="you-selected">
				<strong class="title">You selected: <span><span class="name-text">Album</span>(<sup>$</sup><span class="price-text">9</span>/mo.)</span></strong>
				<div class="photos-num">
					<div class="img-wrap">
						<img src="/assets/images/icon01.png" width="73" height="45" alt="icon">
					</div>
					<span>x <span class="quantity-text">5</span></span>
				</div>
			</div>
			<article class="mailbox-guarantee">
				<h3>Happy Mailbox Guarantee</h3>
				<p>We're not happy till you're happy. If you're not happy with your photos, let us know and we'll be happy to give you a full refund—no questions asked. </p>
			</article>
		</aside>
		<a href="#" class="close">Close X</a>
	</div>
</div>