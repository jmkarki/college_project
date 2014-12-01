<?php
class SalesController extends BaseController{
	public function getIndex(){
		$customer = Customer::all();
		$image = new Image;
 		$userDet = ['img'=>$image->imgloc(Auth::user()->image_id),
					'name' => Auth::user()->name
					];
		$customers = [];
		foreach ($customer as $each) {			
			if($each->persons->company_id == Session::get('company_id')){
				array_push($customers, $each->persons);
			}
		}
		return View::make('sales.sales')->with(['current'=>'sales',
												'customers'=>$customers,
												'userDet'=> $userDet,
												]);
	}
}
?>