<?php
class CustomerController extends BaseController{
	private $userDetail;

	public function __construct(){
		$image = new Image;
		$this->userDetail = ['img'=>$image->imgloc(Auth::user()->image_id),
							'name' => Auth::user()->name
							];
	}
	public function getIndex(){ 		
		return View::make('customer.customer')->with(['current'=>'customer',
													  'userDet' => $this->userDetail,
													  ]);
	}
	public function postStore(){
		$data = ['customer_name' 	=> 'required',
				'addressline1' 		=> 'required',
				'addressline2' 		=> 'required',
				'email' 			=> 'required|email|unique:person',				
				'phone' 			=> 'required',														
				'mobile' 			=> 'required',
				'country' 			=> 'required',
				'city'				=> 'required',
				'postalcode' 		=> 'required'];

    	$validator = Validator::make(Input::all(), $data);
		if($validator->fails()){
			return Redirect::to('/customer')
							->withInput()
							->withErrors($validator);
 		}else {
			$person = new Person;	
			$person->fullname = Input::get('customer_name');
			$person->addressline1 = Input::get('addressline1');
			$person->addressline2 = Input::get('addressline2');
			$person->company_id = Session::get('company_id');
			$person->gender = Input::get('gender');	
			$person->phone = Input::get('phone');
			$person->mobile = Input::get('mobile');
			$person->email = Input::get('email');
			$person->country = Input::get('country');
			$person->city = Input::get('city');
			$person->postcode = Input::get('postalcode');
			$person->save();	

			$customer = new Customer;
			$customer->type = 0;		
			$customer->person_id = $person->person_id;;
			$customer->save();

			return Redirect::to('/customer')->with('message','New customer record created.');
		}

	}

	public function getList(){
		$customers = [];
		$all = Customer::with('persons')->get();
		foreach ($all as $customer) {
			if($customer['persons']->company_id == Session::get('company_id')){
				array_push($customers, $customer);
			}
		} 
		return View::make('customer.customer-list')->with(['customerlist'=> $customers,
															'current'=>'customer',
															'userDet' => $this->userDetail,
															]);
	}
	public function getEachcustomer(){
		if(Input::has('id')){
			return Person::find(Input::get('id'));
		}
	}
	public function getUpdate($id){
		$person = Person::find($id);
		$data = ['person' => $person,
		'current'=>'customer',
		'userDet' => $this->userDetail,];

		return View::make('customer.update-each-customer')->with($data);
	}
	public function postUpdate(){
		$data = ['fullname'		 	=> 'required',
				'addressline1' 		=> 'required',
				'addressline2' 		=> 'required',
				'email' 			=> 'required',				
				'phone' 			=> 'required',														
				'mobile' 			=> 'required',
				'country' 			=> 'required',
				'city'				=> 'required',
				'postcode' 		=> 'required'];

    	$validator = Validator::make(Input::all(), $data);
		if($validator->fails()){
			return Redirect::to('/customer/update/'.Input::get('person_id'))
							->withInput()
							->withErrors($validator);
 		}else {
			$person = Person::find(Input::get('person_id'));	
			$person->fullname = Input::get('fullname');
			$person->addressline1 = Input::get('addressline1');
			$person->addressline2 = Input::get('addressline2');
			$person->gender = Input::get('gender');	
			$person->phone = Input::get('phone');
			$person->mobile = Input::get('mobile');
			$person->email = Input::get('email');
			$person->country = Input::get('country');
			$person->city = Input::get('city');
			$person->postcode = Input::get('postcode');
			$person->update();

			return Redirect::to('/customer/list/')->with('message','New customer record created.');
		}
	}
}
?>