<?php
class SalesController extends BaseController{
	public function getIndex(){
		$customer = Customer::all();
		foreach ($customer as $each) {
			$customers = [];
			if($each->persons->company_id == Session::get('company_id')){
				array_push($customers, $each->persons);

			}
		}
		return View::make('sales.sales')->with(['current'=>'sales','customers'=>$customers]);
	}
}
?>