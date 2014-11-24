<?php

class RegisterController extends BaseController {

	public function postIndex(){
		return View::make('home.start-trial')
					->with(['plantype'=>Input::get('plantype')]);
	}

	public function postNow(){
		$type = (Input::get('plantype') != 0) ? 'premium':'free';
		return View::make('home.start-premium')
					->with(['plantype'=>Input::get('plantype')]);
	}

}