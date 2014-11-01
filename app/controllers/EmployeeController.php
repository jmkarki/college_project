<?php
class EmployeeController extends BaseController{
	public function getIndex(){		
		$employees = Employee::all();
  		return View::make('employee.employee')->with('employees',$employees);
	}
	public function postStore(){
		$person = new Person;
		$person->company_id = 1;
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