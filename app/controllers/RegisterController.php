<?php

class RegisterController extends BaseController {

	public function postIndex(){
		return View::make('home.start-trial')
					->with(['plantype'=>Input::get('planType')]);
	}

	public function postNow(){
 		return View::make('home.start-premium')
					->with(['plantype'=>Input::get('planType')]);
	}

	public function getCheckemail(){
		$data = User::where('email',Input::get('email'))->first();
 		if(empty($data)){
			return 0;
		}
 		if($data->email == Input::get('email')){
			return 1;
		}
		return 0;
	}
	public function getCheckusername(){
		$data = User::where('username',Input::get('username'))->first();
 		if(empty($data)){
			return 0;
		}
 		if($data->username == Input::get('username')){
			return 1;
		}
		return 0;
	}

	public function postTrial(){
		return Redirect::to('/home')->with('message', 'Thankyou! for the registration, please check & activate your account now!.');
	}

}