<?php
class CustomerController extends BaseController{
	public function getIndex(){
 		$customers = Customer::all();
		return View::make('customer.customer')->with('customers',$customers);
	}
	public function postStore(){
		$person = new Person;	
		$person->fullname = Input::get('customer_name');
		$person->address = Input::get('customer_address');
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

	public function getTest(){
		$p = Person::find(3);
		// foreach ($p->customer as $per) {
			// if($per->persons->company_id == 1){
				echo '<pre>';
				echo $p->customer;
			// print_r($per);
			// }
		// }
		
	}
}
?>