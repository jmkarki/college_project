<?php

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payment;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PPConnectionException;

class RegisterController extends BaseController {

	private $api;

    public function __construct(){
        $paypal_conf = Config::get('paypal');
        $this->api = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->api->setConfig($paypal_conf['settings']);
    }

    public function getIndex(){
		return View::make('home.start-trial')
					->with(['plantype'=>Input::get('plan')]);
	}

	public function getNow(){
		$plan = Input::get('plan');
		$plans = Plan::all();
 		return View::make('home.start-premium')
					->with(['plantype'=> $plan,
							'plan'=> $plan,
							'plans'=> $plans]);
	}

    public function postPayment(){
    	$plan = Input::get('plan');
    	$data = ['fullname' 	=> 'required',
				'username' 		=> 'required',
				'email' 		=> 'required|email|unique:users',
				'password' 		=> 'required|min:8',
				'repassword' 	=> 'required|same:password',														
				'company_name' 	=> 'required',
				'country' 		=> 'required',
				'url'			=> 'required',
				'location' 		=> 'required'];

    	$validator = Validator::make(Input::all(), $data);
		if($validator->fails()){
			return Redirect::to('/register/now?plan='.$plan)
							->withInput()
							->withErrors($validator);
 		}else {
 			
			$payable = intval(Plan::find(Input::get('plan'))->amount);	
			$payer 		= new Payer();
			$details 	= new Details();
			$amount 	= new Amount();
			
			$payer->setPaymentMethod("paypal");
		 	$details->setShipping('0.00')
					->setTax('0.00')
					->setSubtotal($payable);
		 	$amount->setCurrency('USD')
					->setTotal($payable)
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
			 	$payment->create($this->api);
			 	$hash = md5($payment->getId());
			 	Session::put('paypal_payment_id', $payment->getId());
			 	Session::put('paypal_hash',$hash);
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

				$key = Str::random(40);
				$user = new User;
				$user->company_id = $company->company_id;
				$user->username = Input::get('username');
				$user->name = Input::get('fullname');
				$user->password = Hash::make(Input::get('password'));
				$user->email = Input::get('email');
				$user->member = 1;
				$user->role_id = 1;
				$user->key = $key;
				$user->save();

			 	$paypal = new PayPal;
			 	$paypal->company_id = $company->company_id;
			 	$paypal->payment_id = $payment->getId();
			 	$paypal->hash = $hash;
			 	$paypal->complete = 0;
			 	$expdate = new DateTime('NOW');
			 	$day = intval(Plan::find(Input::get('plan'))->scheme) - 1;
			 	$expdate->modify('+'.$day.' day')->format('Y-m-d H:i:s');
			 	$paypal->expiry_date = $expdate;
			 	Session::put('company_id', $company->company_id);
			 	Session::put('user_id', $user->user_id);
			 	Session::put('paypal_transaction_id', $paypal->id);
			 	Session::put('email_key', $key);

			 }catch(PPConnectionException $e){
			 	return Redirect::to('error/');
			 }
			foreach ($payment->getLinks() as $link) {
				if($link->getRel() == 'approval_url'){
					$redirctUrl = $link->getHref();
				}
			}
			return Redirect::to($redirctUrl);
		}
	}
	public function getPaymentstatus(){
	    $payment_id = Session::get('paypal_payment_id');
	    $company_id = Session::get('company_id');
		$user_id 	= Session::get('user_id');
		$paypal_trans_id = Session::get('paypal_transaction_id');
		$email_key = Session::get('email_key');
		$paypal_hash = Session::get('paypal_hash');

		$user = User::find($user_id);
		$username = $user->username;
		$email = $user->email;
		$company = Company::find($company_id);
		$fullname = $company->owner_name;
		$company_name = $company->company_name;

	    Session::forget('paypal_payment_id');
	    Session::forget('company_id');
		Session::forget('user_id');
		Session::forget('paypal_transaction_id');
		Session::forget('email_key');
		Session::forget('paypal_hash');

	    if(isset($_GET['approved'])){
		$approved = Input::get('approved') === 'true';
		$notapproved = Input::get('approved') === 'false';

			if($approved){
				$payerId = Input::get('payerID');
				$paymentId = PayPal::find($paypal_hash)->payment_id;
				$payment = Payment::get($paymentId, $this->api);
				$execution = new PaymentExecution();
				$execution->setPayerId($payerId);
				
				//Execute PayPal actually charge User
				$payment->execute($execution, $this->api);

				$updateTransaction = PalPal::find($paymentId);
				$updateTransaction->complete = 1;
				$updateTransaction->update();

				$updateCompany = Company::find($company_id);
				$updateCompany->complete = 1;
				$updateCompany->update();

				$url = URL::to('/register/activateplan');
				$emaildata = [
							'fullname' 		=> $fullname, 
							'email' 		=> $email,
							'url' 			=> $url,
							'logoUrl' 		=> 'logo',
							'key' 			=> $email_key,
							'payment_id' 	=> $paymentId,
							'company_name' 	=> $company_name,
							];
				Mail::send('home.email-premium', $data, function($message){
				        $message->to($email, $fullname)->subject('Success !. Registration Complete.');
				});
				return Redirect::to('/login/')->with('message','Success!, An email has been sent. Please verify your account.');
			}
			if($notapproved){
				$transaction = PayPal::find($paypal_trans_id);
				$transaction->delete();
				$company = Company::find($company_id);
				$company->delete();
				$user = User::find($user_id);
				$user->delete();
				return Redirect::to('/login/')->with('message','Registration Canceled.');
			}
		}	    
	}


	public function getPress(){
		$url = URL::to('/register/activateplan');
		$emaildata = [
					'fullname' 		=> 'Sujip Thapa', 
					'email' 		=> 'sudiptpa@gmail.com',
					'url' 			=> $url,
					'payment_id' 	=> 'a78JIH80Bhgjuyh10nsfp',
					'company_name' 	=> 'Webo',
					'logoUrl' 		=> 'logo',					
					];
		return View::make('home.email-premium')->with('data',$emaildata);
	}

	public function getCheckemail(){
		if(Input::has('email')){
			$data = User::where('email',Input::get('email'))->first();
	 		if(empty($data)){
				return 0;
			}
	 		if($data->email == Input::get('email')){
				return 1;
			}
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
		$data = ['fullname' 	=> 'required',
				'username' 		=> 'required',
				'email' 		=> 'required|email|unique:users',
				'password' 		=> 'required|min:8',
				'repassword' 	=> 'required|same:password',														
				'company_name' 	=> 'required',
				'country' 		=> 'required',
				'location' 		=> 'required'];
		$validator = Validator::make(Input::all(),$data);
		if($validator->fails()){
			return Redirect::to('/register/now?subscription=free')
							->withInput()
							->withErrors($validator);
 		}else {
			try {
			$company = new Company;
			$company->company_name = Input::get('company_name');
			$company->folder_name = substr(strtolower(str_replace(' ','',Input::get('company_name'))), 0, 10);
			$company->owner_name = Input::get('fullname');
			$company->address = Input::get('location');
			$company->country = Input::get('country');
			$company->email = Input::get('email');
			$company->url = (Input::has('url')) ? Input::get('url'):'';
			$company->save();

			$key = Str::random(40);
			$user = new User;
			$user->company_id = $company->company_id;
			$user->username = Input::get('username');
			$user->name = Input::get('fullname');
			$user->member = 0;
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');
			$user->role_id = 1;
			$user->key = $key;
			$user->save();			
			
			$url = URL::to('/register/activate?encrypt='.$key);
			$imgUrl = '';
			Mail::send('home.email', ['fullname'=>Input::get('fullname'),'url'=> $url,'img'=> $imgUrl], function($message){
		        $message->to(Input::get('email'), Input::get('fullname'))->subject('Congratulation !. Thankyou for the registration.');
		    });
			return Redirect::to('/login/index')->with('message', 'Success!, Please check your email & verify your account.');			

			} catch (Exception $e){
					return $e->getMessage();
			}			
		}
	}

	public function postPayments(){
		$data = ['fullname' 	=> 'required',
				'username' 		=> 'required',
				'email' 		=> 'required|email|unique:users',
				'password' 		=> 'required|min:8',
				'repassword' 	=> 'required|same:password',														
				'company_name' 	=> 'required',
				'country' 		=> 'required',
				'url'			=> 'required',
				'location' 		=> 'required'];

 		$validator = Validator::make(Input::all(),$data);
		if($validator->fails()){
			return Redirect::to('/register/now?subscription=premium')
							->withInput()
							->withErrors($validator);
 		}else {
 				$hash = md5(Str::random(40));
 				$company = new Company;
				$company->company_name = Input::get('company_name');
				$company->folder_name = substr(strtolower(str_replace(' ','',Input::get('company_name'))), 0, 10);
				$company->owner_name = Input::get('fullname');
				$company->address = Input::get('location');
				$company->country = Input::get('country');
				$company->email = Input::get('email');
				$company->url = (Input::has('url')) ? Input::get('url'):'';
				$company->plan = Input::get('plan');
				$company->complete = 1;
				$company->payment_id = Str::random(40);
				$company->hash = $hash;
				$company->save();

				$key = Str::random(40);
				$user = new User;
				$user->company_id = $company->company_id;
				$user->username = Input::get('username');
				$user->name = Input::get('fullname');
				$user->password = Hash::make(Input::get('password'));
				$user->email = Input::get('email');
				$user->member = 1;
				$user->role_id = 1;
				$user->key = $key;
				$user->save();

			 	$paypal = new PayPal;
			 	$paypal->company_id = $company->company_id;
			 	$paypal->payment_id = Str::random(40);
			 	$paypal->hash = $hash;
			 	$paypal->complete = 1;
			 	$expdate = new DateTime('NOW');
			 	$day = intval(Plan::find(Input::get('plan'))->scheme) - 1;
			 	$expdate->modify('+'.$day.' day')->format('Y-m-d H:i:s');
			 	$paypal->expiry_date = $expdate;
			 	$paypal->save();			
			
			// $url = URL::to('/register/activate?encrypt='.$key);
			// $imgUrl = '';
			// Mail::send('home.email', ['fullname'=>Input::get('fullname'),'url'=> $url,'img'=> $imgUrl], function($message){
		 //        $message->to(Input::get('email'), Input::get('fullname'))->subject('Congratulation !. Thankyou for the registration.');
		 //    });
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
	public function postSubscriber(){
		if(Input::has('email')){
			$has = Subscriber::where('email', Input::get('email'))->first();
			if(empty($has)){
				$subscriber = new Subscriber;
				$subscriber->email = Input::get('email');
				$subscriber->save();					
			}else{
				$has->email = Input::get('email');
				$has->update();
			}			
			return 1;
		}
		return 0;
	}
}
