<?php

use Jenssegers\Mongodb\Model as Eloquent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	
	use UserTrait, RemindableTrait;

	protected $fillable = array('username','password','name','role');
	protected $collection = 'user';
	protected $hidden = array('password','remember_token');
	public static $rules = array(
		'username' => 'required',
		'password' => 'required'
	);
}