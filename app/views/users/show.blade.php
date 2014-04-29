@extends('layout')
@section('content')

    <div class="holder">
        <header class="headline">
            <h1>My Account</h1>
            <span>This is where you can change your plan &amp; update your account info.</span>
        </header>
        <div id="two-columns">
            <!-- contain the main content of the page -->
            <div id="content">
                <div class="open-close">
                    <div class="info-holder">
                        <div class="my-plan">
                            <div class="header-block">
                                <header class="heading">
                                    <div class="photo-num">
                                        <img src="/assets/images/icon01.png" width="73" height="45" alt="icon">
                                        @if($subscribed)
                                            <span>x <em class="num">{{ $user->plan->metadata->prints_per_month }}</em></span>
                                        @else
                                            <span>x <em class="num">0</em></span>
                                        @endif     
                                    </div>
                                    <h2>My Plan</h2>
                                    <div class="plan">
                                        @if($subscribed)
                                            <span class="plan-left">
                                                The “{{ $user->plan->name }}” (${{ $user->plan->amount / 100 }} / mo.)
                                            </span>
                                        @else
                                            <span class="plan-left">
                                                No subscription
                                            </span>
                                        @endif
                                    </div>

                                </header>
                            </div>

                            @if($subscribed)
                                <div class="update-forms">
                                    @if(!$cancelled)
                                        <div class="update-form" data-change="change-plan">
                                            <h3>Subscription</h3>
                                            @if($user->subscribed())
                                                <p>You can change your subscription level at any time.</p>
                                                <a href="javascript:void(0)" class="update">Change Plan</a>
                                                {{ Form::open() }}
                                                    <select name="plan">
                                                        @foreach ($all_plans as $k => $plan)
                                                            @if ($user->plan->id == $plan->id)
                                                                <option value="{{ $plan->id}}" selected>
                                                            @else
                                                                <option value="{{ $plan->id }}">
                                                            @endif
                                                                {{ $plan->name }} (${{ $plan->amount / 100 }}/mo.) - {{ $plan->metadata->prints_per_month }} Prints
                                                                </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="button-holder">
                                                        <input type="submit" value="Update">
                                                        <a class="close" href="javascript:void(0)">Cancel</a>
                                                    </div>
                                                    <input name="update" type="hidden" value="plan" />
                                                    <input type="hidden" name="_method" value="PUT" />
                                                    <div class="terms">
                                                        <p>By clicking "Update", you confirm that you accept the <a href="/legal">Terms of Service</a> and that your plan will automatically renew monthly  and your credit card will automatically be charged the applicable monthly subscription fee and shipping and handling fees until you cancel.</p>
                                                    </div>
                                                {{ Form::close() }}
                                            @endif
                                        </div>
                                        <div class="update-form" data-change="change-billing">
                                            <h3>Billing Information</h3>
                                            <p>Your card on file is ****-****-****- {{ $user->last_four }}.</p>
                                            <a class="update" href="javascript:void(0)">Update Billing</a>
                                            {{ Form::open(['class' => 'billing-form']) }}
                                                <div class="payment-errors"></div>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="label-wrap">
                                                            <label for="cc-num">Credit Card Number:</label>
                                                            <span>*required</span>
                                                        </div>
                                                        <div class="input-wrap">
                                                            <input class="required-number" id="cc-num" type="text" data-stripe="number">
                                                            <ul class="cc-list">
                                                                <li class="active">
                                                                    <a href="javascript:void(0)">
                                                                        <img src="/assets/images/visa2.jpg" width="32" height="21" alt="visa-card">
                                                                        <span class="hover-state"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <img src="/assets/images/master-card2.jpg" width="32" height="21" alt="master-card">
                                                                        <span class="hover-state"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <img src="/assets/images/discover.jpg" width="32" height="21" alt="discover-card">
                                                                        <span class="hover-state"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
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
                                                                <span>*required</span>
                                                            </div>
                                                            <input class="required-number" id="cvc" type="text" data-stripe="cvc">
                                                            <span>It’s the 3-digit code on the back</span>
                                                        </div>
                                                    </div>
                                                    <!-- End row -->
                                                    <div id="billing-address" class="billing-address">
                                                        <div class="slide-holder">
                                                            <h3>Billing Address</h3>
                                                            <div class="row">
                                                                <div class="first-name">
                                                                    <div class="label-wrap">
                                                                        <label for="f-name1">First Name:</label>
                                                                        <span>*required</span>
                                                                    </div>
                                                                    <input class="required" id="f-name1" type="text" name="f-name1" value="">
                                                                </div>
                                                                <div class="last-name">
                                                                    <div class="label-wrap">
                                                                        <label for="l-name1">Last Name:</label>
                                                                        <span>*required</span>
                                                                    </div>
                                                                    <input class="required" id="l-name1" type="text" name="l-name1" value="">
                                                                </div>
                                                                <input type="hidden" name="name" value="{{ $billing['name'] }}">
                                                            </div>
                                                            <div class="row">
                                                                <div class="label-wrap">
                                                                    <label for="shipping-add1">Billing Address</label>
                                                                    <span>*required</span>
                                                                </div>
                                                                <input class="required shipping-addr" id="shipping-add1" type="text" name="address_line1" value="{{ $billing['address_line1'] }}">
                                                            </div>
                                                            <div class="row">
                                                                <div class="city">
                                                                    <div class="label-wrap">
                                                                        <label for="city7">City</label>
                                                                        <span>*required</span>
                                                                    </div>
                                                                    <input class="required" id="city7" type="text" name="address_city" value="{{ $billing['address_city'] }}">
                                                                </div>
                                                                <div class="state">
                                                                    <div class="label-wrap">
                                                                        <label for="state7">State:</label>
                                                                        <span>*required</span>
                                                                    </div>
                                                                    <input class="required" id="state7" type="text" name="address_state" value="{{ $billing['address_state'] }}">
                                                                </div>
                                                                <div class="zip">
                                                                    <div class="label-wrap">
                                                                        <label for="zip7">Zip:</label>
                                                                        <span>*required</span>
                                                                    </div>
                                                                    <input class="required-number" id="zip7" type="text" name="address_zip" value="{{ $billing['address_zip'] }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="button-holder">
                                                        <input type="submit" class="small" value="Save">
                                                        <a class="close" href="javascript:void(0)">Cancel</a>
                                                    </div>
                                                </fieldset>
                                                <input name="update" type="hidden" value="billing">
                                                <input type="hidden" name="_method" value="PUT" />
                                                <div class="terms">
                                                    <p>By clicking “Complete Order,” you confirm that you accept the <a href="/legal">Terms of Service</a> and that your plan will automatically renew monthly  and your credit card will automatically be charged the applicable monthly subscription fee and shipping and handling fees until you cancel.</p>
                                                </div>
                                            {{ Form::close() }}
                                        </div>
                                    @endif
                                    <div class="update-form" data-change="change-shipping">
                                        <h3>Shipping Information</h3>
                                        @if (!empty($shipping['name']) && !empty($shipping['address_line1']))
                                            <p>Your photos will be shipped to {{ $shipping['name'] }} at {{ $shipping['address_line1'] }}.</p>
                                        @else
                                            <p>Your shipping information has not be provided. Please update shipping information.</p>
                                        @endif
                                        <a class="update" href="javascript:void(0)">Update Shipping</a>
                                        {{ Form::open(['class' => 'shipping-form filled-success']) }}
                                            <div class="slide-holder">
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
                                                        <input type="hidden" name="name" value="{{ $shipping['name'] }}">
                                                    </div>
                                                    <div class="row">
                                                        <div class="label-wrap">
                                                            <label for="shipping-address">Shipping Address:</label>
                                                            <span>*required</span>
                                                        </div>
                                                        <input class="shipping-addr required" id="shipping-address" type="text" name="address_line1" value="{{ $shipping['address_line1'] }}">
                                                    </div>
                                                    <div class="row">
                                                        <div class="city">
                                                            <div class="label-wrap">
                                                                <label for="city">City:</label>
                                                                <span>*required</span>
                                                            </div>
                                                            <input class="required" id="city" type="text" name="address_city" value="{{ $shipping['address_city'] }}">
                                                        </div>
                                                        <div class="state">
                                                            <div class="label-wrap">
                                                                <label for="state">State:</label>
                                                                <span>*required</span>
                                                            </div>
                                                            <input class="required" id="state" type="text" name="address_state" value="{{ $shipping['address_state'] }}">
                                                        </div>
                                                        <div class="zip">
                                                            <div class="label-wrap">
                                                                <label for="zip">Zip:</label>
                                                                <span>*required</span>
                                                            </div>
                                                            <input class="required-number" id="zip" type="text" name="address_zip" value="{{ $shipping['address_zip'] }}">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="button-holder">
                                                    <input type="submit" value="Save" class="small">
                                                    <a class="close" href="javascript:void(0)">Cancel</a>
                                                </div>
                                            </div>
                                            <input name="update" type="hidden" value="shipping">
                                            <input type="hidden" name="_method" value="PUT" />
                                            <div class="terms">
                                                <p>By clicking “Save”, you confirm that you accept the <a href="/legal">Terms of Service</a> and that your plan will automatically renew monthly  and your credit card will automatically be charged the applicable monthly subscription fee and shipping and handling fees until you cancel.</p>
                                            </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            @endif

                            <div class="date-block">
								<span class="print-date">
									My <a href="javascript:void(0)">Go-to-print</a> date:
								</span>
								<span class="date">
									{{ $user->getGoToPrint() }} of each month
								</span>
                            </div>
                        </div>
                        <span class="need-help"><strong>Need help with your account?</strong> Email us at <a href="mailto:&#104;&#101;&#108;&#108;&#111;&#064;&#112;&#104;&#111;&#116;&#111;&#115;&#105;&#110;&#116;&#104;&#101;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">&#104;&#101;&#108;&#108;&#111;&#064;&#112;&#104;&#111;&#116;&#111;&#115;&#105;&#110;&#116;&#104;&#101;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;</a></span>
                        <div class="logininfo-block">
                            <div class="login-top">
                                <h2>Login Info</h2>
                                <div class="row-wrap">
                                    <div class="row">
                                        <span class="label">Email Address:</span>
                                        <strong class="attribute">{{ $user->email }}</strong>
                                    </div>
                                    <div class="row">
                                        <span class="label">Password:</span>
                                        <strong class="attribute password">**********</strong>
                                    </div>
                                </div>
                                <div class="edit-holder"><a href="javascript:void(0)" class="opener">Edit</a></div>
                            </div>
                            <!-- contain open-close -->
                            <div class="slide">
                                <h2>Login Info</h2>
                                <!-- logininfo-form -->
                                {{ Form::open(['class' => 'logininfo-form']) }}
                                    <fieldset>
                                        <div class="current-block">
                                            <div class="row">
                                                <div class="label-wrap">
                                                    <label for="email">Email Address</label>
                                                    <span>*required</span>
                                                </div>
                                                {{ Form::email('email', $user->email, [
                                                    'id' => 'email',
                                                    'class' => 'required-email',
                                                ]) }}
                                            </div>
                                            <div class="row">
                                                <div class="label-wrap">
                                                    <label for="c-password">Current Password</label>
                                                    <span>*required</span>
                                                </div>
                                                {{ Form::password('current_password', ['id' => 'c-password']) }}
                                                <span>(We need your current password to confirm the changes)</span>
                                            </div>
                                        </div>
                                        <div class="new-block">
                                            <div class="row">
                                                <div class="label-wrap">
                                                    <label for="n-password">New Password</label>
                                                    <span> *required</span>
                                                </div>
                                                {{ Form::password('password', [
                                                    'id' => 'n-password',
                                                    'class' => 'required-verify',
                                                    'data-verify' => '#v-password',
                                                ]) }}
                                                <span>(leave blank if you don't want to change it)</span>
                                            </div>
                                            <div class="row">
                                                <div class="label-wrap">
                                                    <label for="v-password">Verify Password</label>
                                                    <span>*required</span>
                                                </div>
                                                {{ Form::password('password_confirmation', [
                                                    'id' => 'v-password',
                                                ]) }}
                                                <span>(leave blank if you don't want to change it)</span>
                                            </div>
                                        </div>
                                        <div class="btns ">
                                            <div class="button-holder">
                                                <input type="submit" value="Save" class="small">
                                            </div>
                                            <a class="opener" href="javascript:void(0)">Cancel</a>
                                        </div>
                                    </fieldset>
                                    <input name="update" type="hidden" value="basic">
                                    <input type="hidden" name="_method" value="PUT" />
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
                @if(!$cancelled)
                    <a href="/unsubscribe" class="cancel-subscription">Cancel your subscription &gt;</a>
                @else
                    <a href="/resume" class="cancel-subscription">Resume your subscription &gt;</a>
                @endif
            </div>
            <!-- contain sidebar of the page -->
            <aside id="sidebar">
                <article class="email-photos">
                    <h2>Email Your Photos</h2>
                    <p>Make sure to email all of your photos in your package to <a href="mailto:photos@photosinthemail.com">photos@photosinthemail.com</a> before your anniversary date.</p>
                </article>
                <blockquote>
                    <q>What I like about photographs is that they capture a moment that’s gone forever, impossible to reproduce.</q>
                    <cite>– Karl Lagerfeld</cite>
                </blockquote>
            </aside>
        </div>
    </div>
@stop