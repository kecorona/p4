<?php

class GroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /group
	 *
	 * @return Response
	 */
	public function indexAction()
	{
		return View::make('group.index', [
			'groups' => Group::all()
		]);
	}

	public function addAction()
	{
		$form = new GroupForm();

		if($form->isPosted())
		{
			if($form->isValidForAdd())
			{
				Group::create([
					'name' => Input::get('name')
				]);

				return Redirect::route('group.index');
			}

			return Redirect::route('group.add')->withInput([
				'name' => Input::get('name'),
				'errors' => $form->getErrors()
			]);
		}

		return View::make('group.add', [
			'form' => $form
		]);
	}

	public function editAction()
	{
		$form = new GroupForm();

		$group = Group::findOrFail(Input::get('id'));
		$url = URL::full();

		if($form->isPosted())
		{
			if($form->isValidForEdit())
			{
				$group->name = Input::get('name');
			}
		}
	}

	public function deleteAction()
	{
		if($form->isValidForDelete())
		{
			$group = Group::findOrFail(Input::get('id'));
			$group->delete();
		}

		return Redirect::route('group.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /group/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /group
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /group/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /group/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('group.edit', [
			'form'	=>	$form,
			'group'	=>	$group,
			'users'	=>	User::all(),
			'resources'	=>	Resource::where('secure', true)->get()
		]);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /group/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /group/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}