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
	public function postStore(){
		$person = new Person;
   		$person->company_id = Session::get('company_id');
 		$person->fullname = Input::get('employee_name');
		$person->address = Input::get('employee_address');
		$person->gender = Input::get('gender');
		$person->phone = Input::get('phone');
		$person->mobile = Input::get('mobile');
		$person->email = Input::get('email');
		$person->save();

		$employee = new Employee;
		$employee->salary = Input::get('salary');
		$employee->post = Input::get('post');
		$employee->joined_date = Input::get('join_date');
		$employee->person_id = $person->person_id;
		$employee->save();

		return Redirect::to('/employee')->with('message','New employee record registerd succesfully.');
	}
}
?>