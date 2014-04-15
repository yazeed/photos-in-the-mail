@section('lightbox')
	<!-- cotain lightbox -->
	<div class="popup-holder">
		<div id="popup4" class="lightbox shipping-info">
			<div class="left-content">
				<h2>Enter Shipping Info</h2>
					<!-- shipping-from -->
					<form action="#" class="shipping-form filled-success">
						<fieldset>
					        <div class="row">
					            <div class="first-name">
					                <div class="label-wrap">
					                    <label for="first-name">First Name:</label>
					                    <span>*required</span>
					                </div>
					                <input class="required" id="first-name" type="text" name="f-name">
					            </div>
					            <div class="last-name">
					                <div class="label-wrap">
					                    <label for="last-name">Last Name:</label>
					                    <span>*required</span>
					                </div>
					                <input class="required" id="last-name" type="text" name="l-name">
					            </div>
					        </div>
					        <div class="row">
					            <div class="email-address">
					                <div class="label-wrap">
					                    <label for="email-id">Email Address:</label>
					                    <span>*required</span>
					                </div>
					                <input class="required-email" id="email-id" type="email" name="email">
					            </div>
					            <div class="password">
					                <div class="label-wrap">
					                    <label for="password">Choose a password:</label>
					                    <span>*required</span>
					                </div>
					                <input type="password" name="password">
					            </div>
					        </div>
					        <div class="row">
					            <div class="label-wrap">
					                <label for="shipping-address">Shipping Address:</label>
					                <span>*required</span>
					            </div>
					            <input class="shipping-addr required" id="shipping-address" type="text" name="s-address">
					        </div>
					        <div class="row">
					            <div class="city">
					                <div class="label-wrap">
					                    <label for="city">City:</label>
					                    <span>*required</span>
					                </div>
					                <input class="required" id="city" type="text" name="city">
					            </div>
					            <div class="state">
					                <div class="label-wrap">
					                    <label for="state">State:</label>
					                    <span>*required</span>
					                </div>
					                <input class="required" id="state" type="text" name="state">
					            </div>
					            <div class="zip">
					                <div class="label-wrap">
					                    <label for="zip">Zip:</label>
					                    <span>*required</span>
					                </div>
					                <input class="required-number" id="zip" type="text" name="zip">
					            </div>
					        </div>
					        <div class="button-holder">
					            <a href="#popup7" class="continue lightbox">continue &gt;</a>
					            <span class="mask"></span>
					        </div>
						</fieldset>
					</form>
				<!-- cotain lightbox -->
				<div class="popup-holder">
				    <div id="popup7" class="lightbox billing-info">
				        <div class="left-content">
        					<h2>Enter Billing Info</h2>
       							<!-- billing-form-->
        						@include('forms.payment')
					            <div class="terms">
					                <p>By clicking “Complete Order,” you confirm that you accept the <a href="#">Terms of Service</a> and that your plan will automatically renew monthly  and your credit card will automatically be charged the applicable monthly subscription fee and shipping and handling fees until you cancel.</p>
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
@stop