<?php
class AdminController extends BaseController{
	public function getIndex(){
		$image = new Image;
 		$userDet = ['img'=>$image->imgloc(Auth::user()->image_id),
					'name' => Auth::user()->name
					];
		return View::make('user.admin')->with(['current'=>'admin',
												'userDet' => $userDet,
												]);
	}
}
?>