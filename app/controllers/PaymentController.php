<?php
class PaymentController extends BaseController{
	public function getIndex(){
		return View::make('payment.payment')->with(['current'=>'payment']);
	}
}
?>