<?php

class RegisterController extends BaseController {

	public function getIndex(){
		return View::make('home.start-trial');
	}

	public function getNow(){
		return View::make('home.start-premium');
	}

}