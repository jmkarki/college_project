<?php
class SupplierController extends BaseController{
	public function getIndex(){
		return View::make('supplier.supplier');
	}
}
?>