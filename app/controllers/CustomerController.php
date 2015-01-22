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
		$person = new Person;	
		$person->fullname = Input::get('customer_name');
		$person->address = Input::get('customer_address');
		$person->company_id = Session::get('company_id');
		$person->gender = Input::get('gender');	
		$person->phone = Input::get('phone');
		$person->mobile = Input::get('mobile');
		$person->email = Input::get('email');
		$person->status = 0;
		$person->save();	

		$customer = new Customer;
		$customer->type = Input::get('select_type');		
		$customer->person_id = $person->person_id;;
		$customer->save();

		return Redirect::to('customer')->with('message','New customer record created.');

	}

	public function getList(){
		$customers = [];
		foreach (Customer::all() as $per) {
			if($per->persons->company_id == Session::get('company_id')){
				$customers['fullname'] 	= $per->persons->fullname;
				$customers['address'] 	= $per->persons->address;
				$customers['gender'] 	= $per->persons->gender;
				$customers['phone'] 	= $per->persons->phone;
				$customers['mobile'] 	= $per->persons->mobile;
				$customers['email'] 	= $per->persons->email;
				$customers['date_birth'] = $per->persons->date_birth;
			}
		} 
		return View::make('customer.customer-list')->with(['customers', $customers,
															'current'=>'customer',
															'userDet' => $this->userDetail,
															]);
	}



	public function getTest(){
		$p = Customer::all();
		
	}
}
?>