<?php

use Acme\Plans\StripePlan;
use Carbon\Carbon;

class UsersController extends \BaseController {


    protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->all();
	  	return View::make('users.index', ['users' => $users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Form to create user.
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();
		if ( ! $this->user->fill($input)->isValid())
		{
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}

		// Store new user.
		$this->user->save();
		return Redirect::route('users.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        if ( ! Auth::check())
        {
            return Redirect::to('/login')->withFlashMessage('Please log in.');
        }

        $vars = [];
        $flash_message = '';
        $this->user = Auth::user();

        Stripe::setApiKey($_ENV['STRIPE_SECRET']);

        // 1. Subscribed?
        $subscribed = $this->user->subscribed();

        if($subscribed)
        {
        	$plans = Stripe_Plan::all()->data;
	        // Sort by amount, small to large - for listing in the select box
	        uasort($plans, function($a, $b) {
	            if ($a->amount == $b->amount) {
	                return 0;
	            }
	            return ($a->amount < $b->amount) ? -1 : 1;
	        });
	        $vars['all_plans'] = $plans;
	        $vars['subscribed'] = true;
	    }

        // 2. Cancelled subscription?
        $cancelled = $this->user->cancelled();

        if($cancelled)
        {
        	$vars['cancelled'] = true;
        	$now = Carbon::now();
        	$ends_date = $this->user->subscription_ends_at;
        	if($now->lt($ends_date))
        	{
        		$expires = $ends_date->toFormattedDateString();
        		$flash_message = "Your subscription has been cancelled and will end on {$expires}.";
        	} else {
        		$flash_message = "Your subscription has been cancelled and ended on {$expires}.";
        	}
        }

        $shipping = $this->user->getShipping();
        $billing = $this->user->getBilling();

        $this->user->plan = Stripe_Plan::retrieve($this->user->stripe_plan);
        $vars['user'] = $this->user;

		if(!empty($flash_message) && !Session::has('flash_message'))
		{
			Session::flash('flash_message', $flash_message);
		}
        return View::make('users.show', $vars + [
        	'shipping' => $shipping,
        	'billing' => $billing,	
        ]);

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

        $this->user = User::find($id);

        $update = Input::get('update');


        if(is_null($this->user) or is_null($update))
        {
			return Response::view('errors.missing', array(), 404);
        }

        switch($update)
        {
        	case 'plan':
        	   	// Set API key
        		Stripe::setApiKey($_ENV['STRIPE_SECRET']);
        		$stripe_plan = Stripe_Plan::retrieve(Input::get('plan'));
		        if (is_null($stripe_plan->id))
		        {
		            return Response::view('errors.generic', array('errors' => 'Something went wrong. Please try again.'), 403);
		        }
		        $this->user->subscription($stripe_plan->id)->swap();
		        $this->user->save();
		        return Redirect::back()->withFlashMessage('Your plan has been updated successfully.');
	        	break;
        	case 'billing':
        		$this->user->getCustomer();
        		$card = $this->user->customer->cards->create(['card' => Input::get('stripeToken')]);
        		$this->user->customer->default_card = $card->id;
        		$this->user->customer->save();
        		$address = Input::only(
        			'name', 'address_line1', 'address_city', 'address_state', 'address_zip'
        		);
        		foreach($address as $key => $value)
        		{
        			if(empty($value))
        			{
	            		return Redirect::back()->withFlashMessage('You did not provide all the necessary address information. All fields are required.');
        			}
        		}
        		$this->user->updateBilling($card->id, $address);
	            return Redirect::back()->withFlashMessage('Your billing information has been updated successfully.');
        		break;
        	case 'shipping' :
        		$this->user->updateShipping(Input::only(
        			'name', 'address_line1', 'address_city', 'address_state', 'address_zip'
        		));
	            return Redirect::back()->withFlashMessage('Your shipping information has been updated successfully.');
        		break;
    		case 'basic':

		        // Consider the credentials;
		        $credentials = Input::only(
		            'email', 'password', 'password_confirmation', 'current_password'
		        );

		        // Check provided password against existing
		        // password in the database
		        if ( ! Hash::check($credentials['current_password'], Auth::user()->password)) {
		            return Redirect::back()->withFlashMessage('The current password you provided is not correct. Please try again.');
		        }

		        // Validation
		        $rules = array_merge(User::$rules, [
		            'password' =>'required|alpha_num|between:6,20|confirmed',
		            'password_confirmation' =>'required|alpha_num'
		        ]);
		        $validator = Validator::make($credentials, $rules);
		        if ($validator->fails())
		        {
		            $messages = $validator->messages();
		            $message = implode(' ', [$messages->first('email'), $messages->first('password')]);
		            return Redirect::back()->withFlashMessage($message);
		        }

		        $user = $this->user;
		        $user->fill($credentials);
		        $user->password = Hash::make($credentials['password']);
		        $user->save();

		        return Redirect::back()->withFlashMessage('Your information has been updated.');
		        break;

        }

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

    /**
     * Get the user's Stripe plan.
     */
    public function setPlan(){

    }

}