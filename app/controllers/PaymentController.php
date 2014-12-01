<?php
class PaymentController extends BaseController{
	public function getIndex(){
		$image = new Image;
 		$userDet = ['img'=>$image->imgloc(Auth::user()->image_id),
					'name' => Auth::user()->name
					];
		return View::make('payment.payment')->with(['current'=>'payment',
													'userDet'=> $userDet,
													]);
	}
}
?>