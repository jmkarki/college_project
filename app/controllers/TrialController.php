<?php

class TrialController extends BaseController {

	public function getIndex(){
		return View::make('home.start-trial');
	}

}