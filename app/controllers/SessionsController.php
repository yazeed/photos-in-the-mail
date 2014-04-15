<?php

class SessionsController extends BaseController {

    /**
     * Login form if user needs to login.
     */
    public function create()
	{

        // If we landed here after logged in, go to admin page.
		if(Auth::check()) return Redirect::to('/users/' . Auth::user()->id);

        // Return view of login form.
        return View::make('sessions.create');
	}

    /**
     * Login action to begin the session
     * Basic form validation for the create() action.
     */
	public function store()
	{
        // Login failed.
		if ( ! Auth::attempt(Input::only('email', 'password')))
		{
            return Redirect::back()->withInput()->with('flash_message', 'Your email and password combination was not correct.');
		}

        // Return the User administration page.
        return Redirect::to('/users/' . Auth::user()->id);
	}

	public function destroy()
    {
		Auth::logout();
		return Redirect::to('login');
	}

}