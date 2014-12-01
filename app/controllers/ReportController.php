<?php
class ReportController extends BaseController{
	public function getIndex(){
		$image = new Image;
 		$userDet = ['img'=>$image->imgloc(Auth::user()->image_id),
					'name' => Auth::user()->name
					];
		return View::make('report.report')->with(['current'=>'report',
												  'userDet' => $userDet,
												  ]);
	}
}
?>