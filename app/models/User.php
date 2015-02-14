<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use \Laravel\Cashier\BillableTrait;
use \Laravel\Cashier\BillableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface, BillableInterface {

	use UserTrait, RemindableTrait, BillableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Users';
	public $timestamps = false;
	protected $fillable = ['first_name', 'last_name', 'email', 'password'];
	protected $primaryKey = 'user_id';

	public static $rules = [

			'first_name' => 'required', 
			'last_name' => 'required', 
			'email' => 'required', 
			'email' => 'unique:Users,email',
			'password' => 'required', 
	];

		public static $rules_reset = [

			'password' => 'required', 
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}