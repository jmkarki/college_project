<?php

class HomeController extends BaseController {

	public function __construct() {
	$this->beforeFilter('csrf', array('on'=>'post'));
	}	
	public function getIndex(){
		$image = new Image;
 		$userDet = ['img'=>$image->imgloc(Auth::user()->image_id),
					'name' => Auth::user()->name
					];
		return View::make('home.home')->with(['current'=>'home',
											  'userDet' => $userDet,
											  ]);
	}
	public function getSupplier(){
		return View::make('supplier.supplier');
	}

}
