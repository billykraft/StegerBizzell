<?php

/* HOME ROUTES */

Route::get('/','HomeController@showHome');
Route::get('/500','HomeController@show500');
Route::get('/404','HomeController@show404');

/* SIGN UP / LOGIN ROUTES */
Route::get('/login','UsersController@index');

/* PAGE ROUTES */
Route::get('/','HomeController@showHome');
Route::get('/services','HomeController@showServices');
	Route::get('/services/roads-and-bridges','HomeController@showRoadsBridges');
	Route::get('/services/utility-design','HomeController@showUtilityDesign');
	Route::get('/services/land-development','HomeController@showLandDevelopment');
	Route::get('/services/land-surveying','HomeController@showLandSurveying');
Route::get('/projects','HomeController@showProjects');
Route::get('/contact-us','HomeController@showContactUs');

Route::get("/projects/{id}", "HomeController@showProject");
Route::get("/projects/delete/{id}", "HomeController@deleteProject");


Route::group(['before' => 'auth'], function()
{
    // Only authenticated users may enter...

    /* User Management */
		Route::get('/account/users','UsersController@overview');
		Route::get('/account/users/create','UsersController@create');
		Route::post('/account/users','UsersController@store');
		Route::get('/account/users/{id}','UsersController@show');
		Route::get('/account/users/{id}/delete','UsersController@deleteUser');
		Route::get('/account/users/{id}/edit','UsersController@editUser');
		Route::post('/account/users/{id}/edit','UsersController@editUserStore');

	/* ACCOUNT ROUTES */
		Route::get('/account/settings','SettingsController@edit');
});

Route::post("/removePhoto", "VizualController@removePic");

/* SESSIONS */
Route::resource('/account/sessions','SessionsController');
Route::get('/account/dashboard','SessionsController@create');
Route::get('login', 'UsersController@index')->before('guest');
Route::get('logout', 'SessionsController@destroy');

/* STRIPE & BILLING CONTROLLER */

/* VIZUAL */
Route::post('vizual','VizualController@submit');
Route::post('/vizual/uploaderSubmit', 'VizualController@upload');
Route::post("/morePhotos/{id}","VizualController@addMore");
