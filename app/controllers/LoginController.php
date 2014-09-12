<?php

class LoginController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('login.login');
	}
	public function postAuthenticate(){
		$user = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'));
		if(Auth::attempt($user)){
			$userdata = User::whereEmail(Input::get('email'))->first();
			print_r($userdata);exit();
			if($userdata->status === 1){
				Auth::logout();
				return Redirect::to()
				->withError('<b>Your email '.Input::get('email').' has been disabled.</b>')
				->withInput();
			}else{
				return Redirect::to('home/');
			}
			return Redirect::to('/')
			->withError("<b>".'The email or password provided is incorrect.'."</b>")
			->withInput();
		}
	}
	public function getTest(){
		return Hash::make('sudiptpa');
	}

}
