<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function __construct() {
		$this->beforeFilter('csrf', ['on' => 'post']);
	}

}
