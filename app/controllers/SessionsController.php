<?php

class SessionsController extends \BaseController {

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

	public function create ()
	{
		if (Auth::check()) {
			$userCount = DB::table('Users')->count();
			$thisUser = Auth::user();
			$pageTitle = "Dashboard";
			return View::make('account.dashboard', compact('pageTitle', 'userCount', 'thisUser'));
		} else {
			return Redirect::guest('login')->with('flash_message','You must be logged in.');
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store () 
	{
		$remember = Input::get('checkbox');
		$email = Input::get('email');
		$password = Input::get('password');
		if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
			// if(Auth::user()->Users_Permissions_id === '1') {
			// 	return Redirect::to('/account/admin');
			// } 
			// else {
				return Redirect::to('/account/dashboard');
			// }
		} 
		else {
			return Redirect::back()->withInput()->with('flash_message','Invalid Login Credentials');
		}
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
	
	public function destroy() 
	{

		Auth::logout();
		return Redirect::to('login')->with('flash_message','You have logged out');

	} 


}
