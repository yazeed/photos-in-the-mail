<div class="form-wrapper billing-form-wrapper">
    <h2>Enter Billing Info</h2>
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
                <!-- End input wrap -->
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
            <!-- End row -->
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
                        <input class="slide-opener" data-slide="#billing-address" id="checkbox1" type="checkbox" checked="checked">
                        <label for="checkbox1">Same as shipping address</label>
                    </div>
                </div>
            </div>
            <!-- End row -->
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
                            <input class="required" id="l-name1" type="text" name="l-name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="label-wrap">
                            <label for="shipping-add1">Shipping Address</label>
                            <span>*</span>
                        </div>
                        <input class="required shipping-addr" id="shipping-add1" type="text" name="shipping-add">
                    </div>
                    <div class="row">
                        <div class="city">
                            <div class="label-wrap">
                                <label for="city7">City</label>
                                <span>*</span>
                            </div>
                            <input class="required" id="city7" type="text" name="city7">
                        </div>
                        <div class="state">
                            <div class="label-wrap">
                                <label for="state7">State:</label>
                                <span>*</span>
                            </div>
                            <input class="required" id="state7" type="text" name="state7">
                        </div>
                        <div class="zip">
                            <div class="label-wrap">
                                <label for="zip7">Zip:</label>
                                <span>*</span>
                            </div>
                            <input class="required-number" id="zip7" type="text" name="zip7">
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-holder">
                <input type="submit" value="Complete order &gt;">
                <span class="mask"></span>
            </div>
        </fieldset>
        <div class="terms">
            <p>By clicking “Complete Order,” you confirm that you accept the <a href="#">Terms of Service</a> and that your plan will automatically renew monthly  and your credit card will automatically be charged the applicable monthly subscription fee and shipping and handling fees until you cancel.</p>
        </div>
        <input type="hidden" name="plan" value="" />
    {{ Form::close() }}
</div>