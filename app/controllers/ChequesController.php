<?php
class ChequesController extends BaseController{
	public function getIndex(){
		return View::make('cheque.cheque')->with(['current'=>'cheque']);
	}
	public function getList(){
		return View::make('cheque.list-cheques')->with(['current'=>'cheque']);
	}
}
?>