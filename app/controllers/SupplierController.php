<?php
class SupplierController extends BaseController{
	private $userDetail;

	public function __construct(){
		$image = new Image;
		$this->userDetail = ['img'=>$image->imgloc(Auth::user()->image_id),
							'name' => Auth::user()->name];
	}
	public function getIndex(){
		$data = ['current'=>'supplier','userDet' => $this->userDetail];		
		return View::make('supplier.supplier')->with($data);
	}
	public function getList(){ 
		$suppliers = [];
		$all = Supplier::with('persons')->get();
		foreach ($all as $each) {
			if($each['persons']->company_id == Session::get('company_id')){
				array_push($suppliers, $each);
			}		
		}
		$data = ['suppliers'=> $suppliers,
				'current'=>'supplier',
				'userDet' => $this->userDetail];
		return View::make('supplier.list-supplier')->with($data);
 		}

		public function postStore(){
			$data = ['fullname' => 'required',
					'addressline1' 	=> 'required',
					'addressline2' 	=> 'required',
					'email' 		=> 'required|email|unique:person',				
					'phone' 		=> 'required',														
					'mobile' 		=> 'required',
					'country' 		=> 'required',
					'city'			=> 'required',
					'postcode' 		=> 'required'];

    	$validator = Validator::make(Input::all(), $data);
		if($validator->fails()){
			return Redirect::to('/supplier')
							->withInput()
							->withErrors($validator);
 		}else {
 			$person = new Person;	
			$person->fullname = Input::get('fullname');
			$person->addressline1 = Input::get('addressline1');
			$person->addressline2 = Input::get('addressline2');
			$person->company_id = Session::get('company_id');
			$person->gender = Input::get('gender');	
			$person->phone = Input::get('phone');
			$person->mobile = Input::get('mobile');
			$person->email = Input::get('email');
			$person->country = Input::get('country');
			$person->city = Input::get('city');
			$person->postcode = Input::get('postcode');
			$person->save();

			$supplier = new Supplier;
			$supplier->type = 0;
			$supplier->person_id = $person->person_id;
			$supplier->save();

			return Redirect::to('/supplier')->with('message','New Supplier Added Successfully');
 		}	
	}
	public function getEachsupplier(){
		if(Input::has('id')){
			return Person::find(Input::get('id'));
		}
	}
	public function getUpdate($id){
		$person = Person::find($id);
		$data = ['person' => $person,
		'current'=>'supplier',
		'userDet' => $this->userDetail];

		return View::make('supplier.update-each-supplier')->with($data);
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
				'postcode' 			=> 'required'];

    	$validator = Validator::make(Input::all(), $data);
		if($validator->fails()){
			return Redirect::to('/supplier/update/'.Input::get('person_id'))
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

			return Redirect::to('/supplier/list')->with('message','Supplier Updated Successfully.');
		}
	}
}
?>