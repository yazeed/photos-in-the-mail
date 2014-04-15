<?php

use \Acme\Plans\StripePlan;
use Carbon\Carbon;

class OrdersController extends \BaseController {

	private $user;

	public function __construct(User $user) {
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
     * Respond to a POST request, most likely a Stripe payment form submission
	 * @return Response
	 */
	public function store()
    {

    	// Set API key
        Stripe::setApiKey(getenv('STRIPE_SECRET'));

        $input = Input::all();

        // If the email is in use, refuse the request for now;
        $user = User::where( 'email', '=', Input::get('stripeEmail') )->first();
        if (!empty($user))
        {
            $email = $user->email;
            return Response::view('errors.duplicate-user', array('email' => $email), 403);
        }

        // Make sure we're working with a valid plan.
        $stripe_plan = Stripe_Plan::retrieve(Input::get('plan'));
        if (is_null($stripe_plan->id))
        {
            return Response::view('errors.generic', array('errors' => 'Something went wrong. Please try again later.'), 403);
        }

        // Proceed.
        // Get a new user.
        $user = new User(Input::get('stripeEmail'), Input::get('password'));

        // Save user.
        $user->save();

        // Sign the user into the website.
        Auth::loginUsingId($user->id);

        // Subscribe.
        $token = Input::get('stripeToken');
        $user->subscription($stripe_plan->id)->create($token);

        if (is_null($user->stripe_id))
        {
            return Redirect::to('users/' . $user->id)->withFlashMessage('Something went wrong while trying to subscribe. Please try agian.');
        }

        // Set go to print date.
        $user->go_to_print = Carbon::now();
        $user->save();

        // Update the customer information at Stripe.
        $cu = Stripe_Customer::retrieve($user->stripe_id);
        $cu->email = $user->email;

    	// Shipping
    	$shipping_fields = Input::only(
    		'name', 'address_line1', 'address_city', 'address_state', 'address_zip'
    	);

    	// No blank metadata fields.
    	foreach($shipping_fields as $key => $value)
    	{
    		if(empty($value))
    		{
    			$shipping_fields[$key] = 'empty';
    		}
    	}

        $cu->metadata = $shipping_fields;
        $cu->save();

        // Billing
    	$same_as_bill = isset($input['shippingSameAsBilling']);
		$billing_fields['name'] = $same_as_bill ? $shipping_fields['name'] : $input['stripeBillingName'];
		$billing_fields['address_line1'] = $same_as_bill ? $shipping_fields['address_line1'] : $input['stripeBillingAddressLine1'];
		$billing_fields['address_city'] = $same_as_bill ? $shipping_fields['address_city'] : $input['stripeBillingAddressCity'];
		$billing_fields['address_state'] = $same_as_bill ? $shipping_fields['address_state'] : $input['stripeBillingAddressState'];
		$billing_fields['address_zip'] = 	$same_as_bill ? $shipping_fields['address_zip'] : $input['stripeBillingAddressZip'];
    	
    	$user->updateBilling($cu->default_card, $billing_fields);

        // Go to the user page.
        return Redirect::to('users/' . $user->id)->withFlashMessage('You have been successfully subscribed.');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}