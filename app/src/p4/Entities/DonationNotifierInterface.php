<?php namespace p4\Entities;

interface DonationNotifierInterface {
	public function notify(array $user, $amount);
}