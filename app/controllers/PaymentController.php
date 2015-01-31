<?php
class PaymentController extends BaseController{

	private $userDetail;
	public function __construct(){
		$image = new Image;
		$this->userDetail = ['img'=>$image->imgloc(Auth::user()->image_id),
							'name' => Auth::user()->name];
	}

	public function getIndex(){
		return View::make('cheque.cheque')
					->with(['current'=>'payment',
						    'userDet'=> $this->userDetail]);

	}

	public function postReceived(){
		$cheque = Cheque::find(Input::get('id'));
		$cheque->status = 1;
		$cheque->update();
		return $cheque->status;
	}

	public function postEachcheque(){
		$cheque = Cheque::find(Input::get('id'));
		return $cheque;
	}
}
?>