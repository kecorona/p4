<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Cartalyst\Sentry\Users\Eloquent\User {

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

	protected $fillable = array('email', 'password', 'password_confirm', 'first_name', 'last_name');

	public static $rules = array(
			'email' => 'required|email|exists:users,email',
			'password' => 'required|min:7'
	);

	public function __construct()
	{
	    $this->setHasher(new \Cartalyst\Sentry\Hashing\NativeHasher);
	}

	public function getAuthIdentifier() {
		return $this->getKey();
	}

	public function getAuthPassword() {
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

	public function posts()
	{
		return $this-has_many('Post');
	}
}
