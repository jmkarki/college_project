<?php
class SalesController extends BaseController{
	public function getIndex(){
		$customer = Company::find(Session::get('company_id'))->persons;
		return $customer;
		return View::make('sales.sales')->with(['current'=>'sales','customer'=>$customer]);
	}
}
?>