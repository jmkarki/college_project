<?php
class SalesController extends BaseController{
	public function getIndex(){
		return View::make('sales.sales')->with(['current'=>'sales']);;
	}
}
?>