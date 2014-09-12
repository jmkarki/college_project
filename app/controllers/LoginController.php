<?php

class LoginController extends BaseController {

	public function getIndex()
	{
		$error = '';
		if(Session::get('error')){
			$error = Session::get('error');
		}
		return View::make('user.login')->withError($error);
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
			$user = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'));
			$remember = (Input::has('remember'))? true : false;
			$field = filter_var(Input::get('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
			if (Auth::attempt(array($field => Input::get('username'), 'password' => Input::get('password')), $remember)) {
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
