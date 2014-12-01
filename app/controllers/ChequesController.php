<?php
class ChequesController extends BaseController{
	public function getIndex(){
		$image = new Image;
 		$userDet = ['img'=>$image->imgloc(Auth::user()->image_id),
					'name' => Auth::user()->name
					];
		return View::make('cheque.cheque')->with(['current'=>'cheque',
												  'userDet'=> $userDet,
												  ]);
	}
	public function getList(){
		$image = new Image;
 		$userDet = ['img'=>$image->imgloc(Auth::user()->image_id),
					'name' => Auth::user()->name
					];
		return View::make('cheque.list-cheques')->with(['current'=>'cheque',
														'userDet' => $userDet,
														]);
	}
}
?>