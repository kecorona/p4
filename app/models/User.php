<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $guarded = array('id');

	protected $fillable = array('first_name', 'last_name');

	public static $rules = array(
		'first_name' => 'required|min:1',
		'email' => 'required|email'
	);

	public function getAuthId() {
		return $this->getKey();
	}

	public function getAuthPw() {
		return $this->password;
	}

	public function getRememberToken() {
		return $this->remember_token;
	}

	public function setRememberToken($value) {
		$this->remember_token = $value;
	}

	public function getRememberTokenName() {
		return "remember_token";
	}

	public function getReminderEmail() {
		return $this->email;
	}

	public function groups()
	{
		return $this->belongsToMany('Group')->withTimestamps();
	}
}
