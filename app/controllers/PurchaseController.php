<?php
class PurchaseController extends BaseController{
	public function getIndex(){
		return View::make('purchase.purchase')->with(['current'=>'purchase']);;
	}
}
?>