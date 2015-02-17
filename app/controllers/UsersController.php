<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		if (Auth::check()) {
			return Redirect::to('/account/dashboard');
		} else {
			return View::make('login');
		}		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$pageTitle = 'Create New User';
		$thisUser = Auth::user();
		return View::make('user.add-new.user', compact('pageTitle', 'id', 'thisUser'));		
	}

	/**
	 * Show table view of users
	 *
	 * @return Response
	 */
	public function overview()
	{
		$pageTitle = 'Admin Users';
		$thisUser = Auth::user();
		$users = DB::table('Users')->get();
		return View::make('account.users', compact('pageTitle', 'users', 'thisUser'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Set up Validation through the Model
		$validation = Validator::make(Input::all(), array(

			"first_name" => "required|alpha",
			"last_name" => "required|alpha",
			"email" => 'required|email|unique:Users',
			"password" => "required|min:8",

		));

		if ( $validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}

		//Create the New User
		$user = new User;
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		date_default_timezone_set('America/Chicago');
		$user->created_at = date("Y-m-d H:i:s");
		// $user->Users_Permissions_id = Input::get('Users_Permissions_id');

		//Save the New User
		$user->save();
		return Redirect::to('/account/users')->with('flash_message', 'You have successfully created a new user.');	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pageTitle = 'User Profile';
		$thisUser = Auth::user();
		$users = DB::table('Users')->where('user_id', $id)->get();
		return View::make('user.show.user', compact('pageTitle', 'users', 'thisUser'));		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editUser($id)
	{
		$thisUser = Auth::user();
		$user = User::find($id);
		$firstName = $user->first_name;
		$lastName = $user->last_name;
		$email = $user->email;
		// $type = $user->Users_Permissions_id;
		$pageTitle = 'Edit User';
		return View::make('user.edit.user', compact('pageTitle', 'id', 'firstName', 'lastName', 'email', 'thisUser'));	
	}

	public function editUserStore($id)
	{

		 $validation = Validator::make(Input::all(), array(

		 	"first_name" => "required|alpha",
		 	"last_name" => "required|alpha",

		 ));

		 global $ID; $ID = $id;

		 $validation->sometimes("email", "required|unique:Users", function($input){
		 	global $ID;
		 	if( Input::get("email") == DB::table("Users")->where("user_id",'=',$ID)->get()[0]->email ){
		 		return false;
		 	}
		 	return true;

		 });

		 $validation->sometimes("password","min:8",function($input){
		 	if( strlen(Input::get("password")) > 0 ){ return true; }
		 	return false;
		 });

		 $validation->sometimes("password2","required|same:password",function($input){
		 	if( strlen(Input::get("password")) > 0 ){ return true; }
		 	return false;
		 });
		 
		 if ( $validation->fails())
		 {
		 	return Redirect::back()->withInput()->withErrors($validation->messages());
		 }

		$user = User::find($id);

		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->email = Input::get('email');

		if( strlen(Input::get("password")) > 0 ){
			$user->password = Hash::make(Input::get('password'));
		}
		// $user->Users_Permissions_id = Input::get('Users_Permissions_id');
		$user->save();

		$users = DB::table('Users')->where('user_id', $id)->get();
		$thisUser = Auth::user();

		$pageTitle = 'User Profile';
		return View::make('user.show.user', compact('pageTitle', 'users', 'user', 'thisUser'));
	}

	public function deleteUser($id) {
		$users = DB::table('Users')->where('user_id', $id)->delete();
		return Redirect::to('/account/users')->with('flash_message', 'You have successfully deleted this user.');	
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
