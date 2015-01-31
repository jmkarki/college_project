<?php
class ChequesController extends BaseController{

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

	public function getList(){
		return View::make('payment.payment')->with(['current'=>'payment',
														'userDet' => $this->userDetail,
														]);
	}

	public function postStore(){
		return Input::all();


		$rules = ['cheque_no' => 'required',
				'account_no' => 'required',
				'cheque_name' => 'required',
				'issued_date'=> 'required',
				'due_date'=> 'required',
				'bank_name' => 'required',
				'amount' => 'required|numeric',
				'beneficiary' => 'required',
				'cashed_date' => 'required',
				'drawee_name' => 'required'];

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('/payment')
							->withInput()
							->withErrors($validator);
 		}else {
 			$cheque = new Cheque;
 			$cheque->cheque_no = Input::get('cheque_no');

 			
 		}
	}
}
?>