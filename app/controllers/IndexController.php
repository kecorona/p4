<?php

class IndexController extends BaseController {

	public function __construct()
	{
		if(Request::is('www.index.index'))
		{
			$this->layout = 'layouts.public';
		}
	}

	public function indexAction()
	{
		return View::make('www.index.index');
	}
}