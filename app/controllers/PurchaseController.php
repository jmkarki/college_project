<?php
class PurchaseController extends BaseController{
	public function getIndex(){
		$image = new Image;
 		$userDet = ['img'=>$image->imgloc(Auth::user()->image_id),
					'name' => Auth::user()->name
					];
		return View::make('purchase.purchase')->with(['current'=>'purchase',
													  'userDet' => $userDet,
													  ]);;
	}
}
?>