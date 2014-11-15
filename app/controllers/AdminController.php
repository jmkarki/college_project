<?php
class AdminController extends BaseController{
	public function getIndex(){
		return View::make('user.admin')->with('current','admin');
	}
}
?>