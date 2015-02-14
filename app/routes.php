<?php

/* HOME ROUTES */

Route::get('/','HomeController@showHome');
Route::get('/500','HomeController@show500');
Route::get('/404','HomeController@show404');

/* PAGE ROUTES */


Route::get('/','HomeController@showHome');
Route::get('/services','HomeController@showServices');
	Route::get('/services/roads-and-bridges','HomeController@showRoadsBridges');
	Route::get('/services/utility-design','HomeController@showUtilityDesign');
	Route::get('/services/land-development','HomeController@showLandDevelopment');
	Route::get('/services/land-surveying','HomeController@showLandSurveying');
Route::get('/projects','HomeController@showProjects');
Route::get('/contact-us','HomeController@showContactUs');


/* ACCOUNT ROUTES */
Route::resource('/login','UsersController');

/* SESSIONS */
Route::resource('/account/sessions','SessionsController');

/* STRIPE & BILLING CONTROLLER */