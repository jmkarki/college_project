<?php
class SupplierController extends BaseController{
	public function getIndex(){
 
		$suppliers = Supplier::all();
		return View::make('supplier.supplier')->with('suppliers',$suppliers);
 		}
		public function postStore(){
		$person = new Person;	
		$person->fullname = Input::get('supplier_name');
		$person->address = Input::get('supplier_address'); 
		$person->company_id = Session::get('company_id');
 		$person->gender = Input::get('gender');	
		$person->phone = Input::get('phone');
		$person->mobile = Input::get('mobile');
		$person->email = Input::get('email');
		$person->status = 0;
		$person->save();	

		$supplier = new Supplier;
		$supplier->type = Input::get('select_type');		
		$supplier->person_id = $person->person_id;
		$supplier->save();

		return Redirect::to('supplier')->with('message','New supplier record created.');

	}
}
?>