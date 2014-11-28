<?php

class RegisterController extends BaseController {

	public function getIndex(){
		return View::make('home.start-trial')
					->with(['plantype'=>Input::get('plan')]);
	}

	public function getNow(){
		// $startTimeStamp = strtotime('2014-01-01');
		// $endTimeStamp = strtotime('2014-1-31');
		// $timeDiff = abs($endTimeStamp - $startTimeStamp);
		// $numberDays = $timeDiff/86400;  // 86400 seconds in one day
		// // and you might want to convert to integer
		// $numberDays = intval($numberDays);
		// return $numberDays;

		$plan = Plan::find(Input::get('plan'));
		$plans = Plan::all()->except(Input::get('plan'));
 		return View::make('home.start-premium')
					->with(['plantype'=>Input::get('plan'),'plan'=> $plan,'plans'=> $plans]);
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
		$validator = Validator::make(Input::all(),array('fullname' 	=> 'required',
														'username' 	=> 'required',
														'email' 	=> 'required|email|unique:users',
														'password' 	=> 'required|min:8',
														'repassword' => 'required|same:password',														
														'company_name' => 'required',
														'country' 	=> 'required',
														'location' 	=> 'required'));
		if($validator->fails()){
			return Redirect::to('/register/now?subscription=free')
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

			$key = str_random(40);
			$user = new User;
			$user->company_id = $company->company_id;
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');
			$user->key = $key;
			$user->save();			
			
			$url = URL::to('/register/activate?encrypt='.$key);
			$imgUrl = '';
			Mail::send('home.email', ['fullname'=>Input::get('fullname'),'url'=> $url,'img'=> $imgUrl], function($message){
		        $message->to(Input::get('email'), Input::get('fullname'))->subject('Congratulation !. Thankyou for the registration.');
		    });
			return Redirect::to('/login/index')->with('message', 'Success!, Please check your email & verify your account.');			
		}
	}

	public function postPremium(){
 		$validator = Validator::make(Input::all(),array('fullname' 	=> 'required',
														'username' 	=> 'required',
														'email' 	=> 'required|email|unique:users',
														'password' 	=> 'required|min:8',
														'repassword' => 'required|same:password',														
														'company_name' => 'required',
														'country' 	=> 'required',
														'url'		=> 'required',
														'location' 	=> 'required'));
		if($validator->fails()){
			return Redirect::to('/register/now?subscription=premium')
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

			$key = str_random(40);
			$user = new User;
			$user->company_id = $company->company_id;
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');
			$user->key = $key;
			$user->save();			
			
			$url = URL::to('/register/activate?encrypt='.$key);
			$imgUrl = '';
			Mail::send('home.email', ['fullname'=>Input::get('fullname'),'url'=> $url,'img'=> $imgUrl], function($message){
		        $message->to(Input::get('email'), Input::get('fullname'))->subject('Congratulation !. Thankyou for the registration.');
		    });
			return Redirect::to('/login/index')->with('message', 'Success!, Please check your email & verify your account.');			
		}
	}

	public function getActivate(){
		$userdata = User::where('key', Input::get('encrypt'))->first();
		if(empty($userdata) || $userdata->key != Input::get('encrypt')){
			return Redirect::to('/login/index')->with('message','Invalid request,  key expired.');
		}
		if($userdata->key == Input::get('encrypt')){
			$user = User::find($userdata->user_id);
			$user->key = '';
			$user->status = 1;
			$user->update();

			return Redirect::to('/login')->with('message','Done!, Your Webo Account is ready. Please Sign in!.');
		}
	}
}