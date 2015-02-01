<?php
class EmployeeController extends BaseController{
	private $userDetail;

	public function __construct(){
		$image = new Image;
 		$this->userDetail = ['img'=>$image->imgloc(Auth::user()->image_id),
							'name' => Auth::user()->name];
	}
	public function getIndex(){
		$data = ['current'=>'employee',
  				'userDet' => $this->userDetail];

  		return View::make('employee.employee')->with($data);
	}

	public function getList(){
		$employee = [];
		$all = Employee::with('persons')->get();
		foreach ($all as $each) {
			if($each['persons']->company_id == Session::get('company_id')){
				array_push($employee, $each);
			}
		}
		$data = ['current'=>'employee',
				'employees' => $employee,
  				'userDet' => $this->userDetail];

		return View::make('employee.list-employees')->with($data);
	}

	public function postEndtitle(){
		$title = Title::find(Input::get('id'));
		$date = new DateTime('NOW');
		$title->ended_at = $date->format('Y-m-d H:i:s');
		$title->update();
		return $title;//1;
	}

	public function getNewtitle(){
		return  'a';
	}

	public function postEachemployee(){
	$employee = Employee::with('persons')->with('title')->where('employee_id', '1')->first();
		foreach ($employee['title'] as $each) {
			$each->department = Department::find($each->department_id)->name;
		}
		return $employee;
	}

	public function getEachemployee(){
	$employee = Employee::with('persons')->with('title')->where('employee_id', '1')->first();
		foreach ($employee['title'] as $each) {
			$each->department = Department::find($each->department_id)->name;
		}
		return $employee;
	}


	public function postStore(){
		$imgId = 0;
		if(Input::file('uploadImage') != ''){
			$image = new Image;
			$imgData = $image->upload();
			$imgId = $imgData->id;
		}
		$data = ['fullname'		 	=> 'required',
				'addressline1' 		=> 'required',
				'addressline2' 		=> 'required',
				'email' 			=> 'required|email|unique:person',				
				'phone' 			=> 'required',														
				'mobile' 			=> 'required',
				'country' 			=> 'required',
				'city'				=> 'required',
				'postcode' 			=> 'required'];

    	$validator = Validator::make(Input::all(), $data);
		if($validator->fails()){
			return Redirect::to('/employee')
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

			$employee = new Employee;
			$date = new DateTime('NOW');
			$employee->joined_date = $date->format('Y-m-d H:i:s');
			$employee->image_id = $imgId;
			$employee->person_id = $person->person_id;
			$employee->save();
		}
	
		return Redirect::to('/employee')->with('message','New Employee Added Successfully.');
	}
}
?>