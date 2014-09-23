<?php
class CustomerController extends BaseController{
	public function getIndex(){
		$customers =  DB::table('customer')->leftJoin('person', 'person.person_id', '=', 'customer.person_id')->get();
		return View::make('customer.customer')->with('customers',$customers);
	}
	public function postStore(){
		$person = new Persons;	
		$person->fullname = Input::get('customer_name');
		$person->address = Input::get('customer_address');
		$person->gender = Input::get('gender');		
		$person->status = 0;
		$person->save();	

		$customer = new Customer;
		$customer->type = Input::get('select_type');		
		$customer->person_id = $person->person_id;;
		$customer->save();

		return Redirect::to('customer')->with('message','New customer record created.');

	}
}
?>