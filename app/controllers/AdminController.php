<?php

class AdminController extends BaseController {
	
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('auth');
	}

	public function index()
	{
		return View::make('admin.index');
	}
}