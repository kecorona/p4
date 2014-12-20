<?php

class EventController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Event::all();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return Event::create([
			'name'	=>	Input::get('name'),
			'description'	=>	Input::get('description'),
			'started_at'	=>	Input::get('started_at'),
			'ended_at'		=>	Input::get('ended_at')
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($event)
	{
		return $event;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($event)
	{
		$event->name 		=	Input::get('name');
		$event->description =	Input::get('description');
		$event->started_at	=	Input::get('started_at');
		$event->ended_at	= 	Input::get('ended_at');
		$event->save();
		return $event;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$event->delete();
		return Response::json(true);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('events.create')
	}



	


	


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('events.edit');
	}


	

	


}
