<?php

class RegisterController extends BaseController {

	public function postIndex(){
		return Input::get('planType');
		return View::make('home.start-trial')
					->with(['plantype'=>Input::get('plantype')]);
	}

	public function postNow(){
		return Input::get('planType');
		$type = (Input::get('planType') != 0) ? 'premium':'free';
		return View::make('home.start-premium')
					->with(['plantype'=>Input::get('planType')]);
	}

}