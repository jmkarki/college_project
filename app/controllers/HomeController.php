<?php

class HomeController extends BaseController {

	public function __construct() {
	$this->beforeFilter('csrf', array('on'=>'post'));
	}	
	public function getIndex()
	{
		return Session::get('company_id');
		return View::make('home.home');
	}
	public function getSupplier(){
		return View::make('supplier.supplier');
	}

}
