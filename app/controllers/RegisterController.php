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

	public function postPremium(){
 		$validator = Validator::make(Input::all(),array('fullname' => 'required',
														'username' => 'required',
														'email' 	=> 'required|email|unique:users',
														'password' => 'required|min:8',
														'repassword' => 'required|same:password',														
														'company_name' => 'required',
														'country' => 'required',
														'url'	=> 'required',
														'location' => 'required'));
		if($validator->fails()){
			return Redirect::to('/register/now')
							->withInput()
							->withErrors($validator);
 		}else {
			$company = new Company;
			$company->company_name = Input::get('company_name');
			$company->folder_name = substr(strtolower(str_replace(' ','',Input::get('company_name'))), 0, 10);
			$company->owner_name = Input::get('fullname');
			$company->address = Input::get('location');
			$company->country = Input::get('country');
			$company->email = Input::get('email');
			$company->url = (Input::has('url')) ? Input::get('url'):'';
			$company->save();

			$user = new User;
			$user->company_id = $company->company_id;
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');
			$user->save();
			$data = ['url'=>'https://dashboard.stripe.com/confirm_email?t=zaxXLiW8uQOIeKoKSb5fZ2BJhELPGHLm','name'=>Input::get('fullname')];

			Mail::send('home.email', $data, function($message)
			{
			    $message->to(Input::get(''), 'Jane Doe')->subject('This is a demo!');
			});

			return Redirect::to('/home')->with('message','Thankyou for the registration, Please check your email and Activate your account');
		}
	}

	public function getTest(){
		return View::make('home.email');
	}

}