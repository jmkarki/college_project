<?php

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payment;
use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PPConnectionException;

class RegisterController extends BaseController {

    public function postPayment(){
    	$payable = Plan::find(Input::get('plan'))->amount;
    	$api = new ApiContext(new OAuthTokenCredential(
			'AXKlYhC80o5JGneIcL1m9ZgGb94bSM0ejqLrYUUlY2qzDGtWdZdIcu_csjME',
			 'EDc92hBefDAZeNQxCTkkWH_f9aw59mbgzfjZmejEZnYmlDg-6p4nCcVPbGIP')
		);
		$api->setConfig([
		'mode'=> 'sandbox',
		'http.ConnectionTimeout' => 30,
		'log.LogEnabled' => false,
		'validation.level' => 'log',
		]);

	
	$payer = new Payer();
	$details = new Details();
	$amount = new Amount();
	
	$payer->setPayment_method('paypal');
	 //details
	$details->setShipping('0.00')
			->setTax('0.00')
			->setSubtotal('0.00');
	//amount
	$amount->setCurrency('GBP')
			->setTotal('22.00')
			->setDetails($details);
	$transaction = new Transaction();
    $transaction->setAmount($amount)
				->setDescription('Membership');

	$redirectUrls = new RedirectUrls();			
	$redirectUrls->setReturnUrl(URL::to('/register/paymentstatus').'?approved=true')
				->setCancelUrl(URL::to('/register/paymentstatus').'?approved=false');
	
	$payment = new Payment();
	$payment->setIntent('sale')
		->setPayer($payer)
		->setTransactions([$transaction])
		->setRedirectUrls($redirectUrls);
	 try{
	 	$payment->create($api);
	 	$hash = md5($payment->getId());
	 	$_SESSION['paypal_hash'] = $hash;
	 	$company = new Company;
		$company->company_name = Input::get('company_name');
		$company->folder_name = substr(strtolower(str_replace(' ','',Input::get('company_name'))), 0, 10);
		$company->owner_name = Input::get('fullname');
		$company->address = Input::get('location');
		$company->country = Input::get('country');
		$company->email = Input::get('email');
		$company->url = (Input::has('url')) ? Input::get('url'):'';
		$company->plan = Input::get('plan');
		$company->complete = 0;
		$company->payment_id = $payment->getId();
		$company->hash = $hash;
		$company->save();

		$key = str_random(40);
		$user = new User;
		$user->company_id = $company->company_id;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');
		$user->key = $key;
		$user->save();

	 	$paypal = new PayPal;
	 	$paypal->company_id = $company->company_id;
	 	$paypal->payment_id = $payment->getId();
	 	$paypal->hash = $hash;
	 	$paypal->complete = 0;
	 	$paypal->save();

	 	Session::put('company_id', $company->company_id);
	 	Session::put('user_id', $user->user_id);
	 	Session::put('paypal_transaction_id', $paypal->id);
	 	Session::put('email_key', $key);

	 }catch(PPConnectionException $e){
	 	//Perhaps log an error
	 	return Redirect::to('error/');
	 }
	foreach ($payment->getLinks() as $link) {
		if($link->getRel() == 'approval_url'){
			$redirctUrl = $link->getHref();
		}
	}
	return Redirect::to($redirctUrl);
	}
	public function getPaymentStatus(){ 
    $payment_id = Session::get('paypal_payment_id');
    Session::forget('paypal_payment_id');

    if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        return Redirect::to('error/paymenterror')
            ->with('error', 'Payment Failed');
    }

    $payment = Payment::get($payment_id, $this->_api_context);
    $execution = new PaymentExecution();
    $execution->setPayerId(Input::get('PayerID'));
    $result = $payment->execute($execution, $this->_api_context);
    if ($result->getState() == 'approved') {
        return Redirect::route('register/success')
            ->with('success', 'Payment success');
       //write the user and company data after this step
    }
    return Redirect::route('error/paymenterror')
        ->with('error', 'Payment Failed');
}


	public function getIndex(){
		return View::make('home.start-trial')
					->with(['plantype'=>Input::get('plan')]);
	}

	public function getNow(){
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



// $startTimeStamp = strtotime('2014-01-01');
// $endTimeStamp = strtotime('2014-1-31');
// $timeDiff = abs($endTimeStamp - $startTimeStamp);
// $numberDays = $timeDiff/86400;  // 86400 seconds in one day
// // and you might want to convert to integer
// $numberDays = intval($numberDays);
// return $numberDays;