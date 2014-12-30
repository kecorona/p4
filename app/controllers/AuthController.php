<?php

class AuthController extends \BaseController {


	
	public function getLogin()
	{
		if(Sentry::check())
		{
			return Redirect::route('index');
		}
		return View::make('pages.login');
	}

	public function postLogin()
	{
        $input = array(
            'email' => \Input::get('email'),
            'password' => \Input::get('password'),
        );
 
        $rules = array (
            'email' => 'required|email',
            'password' => 'required'
        );
 
        $validator = Validator::make($input, $rules);        
        if ( $validator->fails() )
        {
            if(Request::ajax())
            {
                return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
            } else{
                return Redirect::back()->withInput()->withErrors($validator);
            }
 
        } else {
            try
                {
                    $user = Sentry::getUserProvider()->findByLogin(\Input::get('email'));
                    $throttle = Sentry::getThrottleProvider()->findByUserId($user->id);
                    $throttle->check();
                            $credentials = ['email' => \Input::get('email'), 'password' => \Input::get('password')];
                    $user = Sentry::authenticate($credentials);
                } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                  return Response::json(['success' => false,'errors' => ['login' => ['Invalid username or password.']], 400]);
                } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
                    return Response::json(['success' => false,'errors' => ['login' => ['You have not yet activated this account.']], 400]);
                }
                catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
                    $time = $throttle->getSuspensionTime();
                    return Response::json(['success' => false,'errors' => ['login' => ['Your account has been suspended for $time minutes.']], 400]);
                                } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
                  return Response::json(['success' => false,'errors' => ['login' => ['You have been banned.']], 400]);
                }
                return Response::json(['success' => true], 200);
        }
 
    }

	public function getLogout()
	{
		Sentry::logout();

		return Redirect::to('index');
	}
	/**
	 * Display a listing of the resource.
	 * GET /auth
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /auth/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /auth
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /auth/{id}
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
	 * GET /auth/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /auth/{id}
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
	 * DELETE /auth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}