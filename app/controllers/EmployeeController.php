<?php
class EmployeeController extends BaseController{
	public function getIndex(){
		return View::make('employee.employee');	
	}
}
?>