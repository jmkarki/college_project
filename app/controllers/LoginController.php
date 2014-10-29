<?php

class LoginController extends BaseController {

	public function getIndex(){
		return View::make('home.index');
	}
	public function getAuth()
	{
		$error = '';
		if(Session::get('error')){
			$error = Session::get('error');
		}
		return View::make('user.login')->withError($error);
		// $a = Company::find(1);
		// return $a->users;
	}
	public function postAuthenticate(){
		$validator = Validator::make(Input::all(),array(
			'username' => 'required',
			'password' => 'required'
			));
		if($validator->fails()){
			return Redirect::to('login')
					->withInput()
					->withErrors($validator);
		}else{
			$field = filter_var(Input::get('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
			$user = array(
			$field => Input::get('username'),
			'password' => Input::get('password'));
			$remember = (Input::has('remember'))? true : false;
			if (Auth::attempt($user, $remember)) {
				$userdata = User::where($field, Input::get('username'))->first();
				if($userdata->status === 1){
					return Redirect::to('login')
						->withError('The username '.Input::get('username').' has been disabled.')
						->withInput();
				}
				Session::put('company_id',$userdata->company_id);
				return Redirect::to('/home');
			}else{
				return Redirect::to('login')
					->withError('The email or password provided is incorrect.')
					->withInput();
			}
			Redirect::to('login')->withError('There was a problem signing you in.');
		}

	}
}
