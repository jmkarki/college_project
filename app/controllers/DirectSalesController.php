<?php 
class DirectSalesController extends BaseController{
	public function getIndex(){
		return View::make('sales.direct-sales');
	}
}

?>