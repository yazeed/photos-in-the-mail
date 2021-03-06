<?php

// REMOVE THIS
//Auth::loginUsingId(1);

/*
|--------------------------------------------------------------------------
| Home page
|--------------------------------------------------------------------------
|
| We intend to show the home page to users who are not authenticated.
| If you are authenticated, then any GET request to the home page should
| redirect to the account page for the user.
|
*/
Route::get('/', function()
{

    // $data = ['token' => ''];
    // Mail::queue('emails.auth.reminder', $data, function($message)
    // {
    //     $message->to('mvanmeter1@gmail.com')
    //             ->subject('Welcome to the Photos in the Mail');
    // });


    if (Auth::check())
    {
        return Redirect::to('/users/' . Auth::user()->id);
    }
    return View::make('index', ['bodyClass' => 'front']);
});

// Helper AJAX to get if user exists by email.
Route::get('email', function() {	
	$input = Input::only('email');
	if (Request::ajax() && isset($input['email']))
	{
		$user = User::where('email', '=', $input['email']);
		$count = $user->count();
		return Response::json(['count' => $count]);
	} else {
		return Response::make('Sorry, this page is not here.', 404);
	}
});

// Handle failed payments and cancelling subscriptions.
Route::post('stripe/webhook', 'PhotosWebhookController@handleWebhook');


/*
|---------------------------------------------
| Users and Sessions
|---------------------------------------------
*/
Route::resource('sessions', 'SessionsController');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('users', 'UsersController');

/*
|---------------------------------------------
| Subscriptions
|---------------------------------------------
*/
Route::get('unsubscribe', function()
{
    if (Auth::check())
    {
    	return View::make('users.cancel', ['user' => Auth::user()]);
    }
	return Response::view('errors.missing', array(), 404);
});

Route::get('/unsubscribe/authorize', function() {
    if (Auth::check())
    {
    	$user = Auth::user();
    	$user->subscription()->cancel();
    	return Redirect::to('/users/' . $user->id);
    }
	return Response::view('errors.missing', array(), 404);
});

Route::get('resume', function()
{
    if (Auth::check())
    {
        $user = Auth::user();
        if ($user->cancelled()) {
            Stripe::setApiKey(getenv('STRIPE_SECRET'));
            $plan = Stripe_Plan::retrieve($user->stripe_plan);
            return View::make('users.resume', ['user' => $user, 'plan' => $plan]);
        } else {
            return Redirect::to('/users/' . $user->id);
        }
    }
    return Response::view('errors.missing', array(), 404);
});

Route::post('resume', function()
{
    if (Auth::check())
    {
        $input = Input::all();
        if (!empty($input['stripeToken']))
        {
            $user = Auth::user();
            if ($user->cancelled()) {
                $user->subscription($input['plan'])->resume($input['stripeToken']);
                return Redirect::to('/users/' . $user->id)->withFlashMessage('You have been resubscribed!');
            } else {
                return Redirect::to('/users/' . $user->id);
            }
        }
    }
    return Response::view('errors.missing', array(), 404);
});

/*
|---------------------------------------------
| Reset password
|---------------------------------------------
*/
Route::controller('password', 'RemindersController');

/*
|---------------------------------------------
| Orders
|---------------------------------------------
*/
Route::resource('orders', 'OrdersController');

/*
|---------------------------------------------
| Legal
|---------------------------------------------
*/
Route::get('legal', function() {
    return View::make('legal');
});