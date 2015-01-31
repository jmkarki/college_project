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
		$cheque = Cheque::where('company_id', Session::get('company_id'))->get();
		foreach ($cheque as $each) {
			if($each->customer_id == 0 & $each->supplier_id != 0){
				$supplier = Supplier::with('persons')->where('supplier_id',$each->supplier_id )->first()['persons'];
				$each->customer_name = $supplier->fullname;
				$each->phone = $supplier->phone;
			}
			if($each->customer_id != 0 & $each->supplier_id == 0){
				$cust = Customer::with('persons')->where('customer_id',$each->customer_id )->first()['persons'];
				$each->customer_name = $cust->fullname;
				$each->phone = $cust->phone;
			}
		}
		// return $cheque;

		return View::make('payment.payment')->with(['current'=>'payment',
													'userDet' => $this->userDetail,
													'cheques' => $cheque]);
	}

	public function postStore(){
		$data = ['cheque_no' => 'required',
				'account_no' => 'required',
				'cheque_name' => 'required',
				'issued_date'=> 'required',
				'due_date'=> 'required',
				'bank_name' => 'required',
				'amount' => 'required|numeric',
				'benificiary' => 'required',
				'cashed_date' => 'required',
				'drawee_name' => 'required'];

    	$validator = Validator::make(Input::all(), $data);
		if($validator->fails()){
			return Redirect::to('/payment')
							->withInput()
							->withErrors($validator);
 		}else {
 			$cheque = new Cheque;
 			$cheque->company_id = Session::get('company_id');
 			$cheque->cheque_no = Input::get('cheque_no');
 			$cheque->account_no = Input::get('account_no');
 			$cheque->cheque_name = Input::get('cheque_name');
 			$cheque->issued_date = Input::get('issued_date');
 			$cheque->due_date = Input::get('due_date');
 			$cheque->bank_name = Input::get('bank_name');
 			$cheque->amount = Input::get('amount');
 			$cheque->beneficiary = Input::get('benificiary');
 			$cheque->cashed_date= Input::get('cashed_date');
 			$cheque->drawee_name = Input::get('drawee_name');
 			$cheque->save();

 			return Redirect::to('cheques/list')->with(['message'=> 'New Cheque Payment Added']);
		}
	}
}
?>