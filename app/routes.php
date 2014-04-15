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
Route::post('stripe/webhook', 'Laravel\Cashier\WebhookController@handleWebhook');


/*
|---------------------------------------------
| Users and Sessions
|---------------------------------------------
*/
Route::resource('sessions', 'SessionsController');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('users', 'UsersController');

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