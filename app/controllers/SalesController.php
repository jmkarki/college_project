<?php
class SalesController extends BaseController{

	private $userDetail;
	public function __construct(){
		$image = new Image;
		$this->userDetail = ['img'=>$image->imgloc(Auth::user()->image_id),
					'name' => Auth::user()->name];
	}	
	public function getIndex(){
		$customerlist = [];
		$customers = Customer::with('persons')->get();
		foreach ($customers as $each) {
			if($each['persons']->company_id == Session::get('company_id')){
				array_push($customerlist, $each);
			}
		}
		$items = Company::with('products')->where('company_id', Session::get('company_id'))->get();
		return View::make('sales.sales')
					->with(['current'=>'',
							'userDet' => $this->userDetail,
							'customers' => $customerlist,
							'items' => $items[0]['products']]);
	}

	public function postProductoption(){
		$data = [];
		$product = Product::with('option')->where('product_id', Input::get('id'))->first();
		return $product['option'];
	}

	public function postOptionprice(){
		return Price::find(Input::get('id'))->sell_price;
	}
	public function postEachsales(){
		if(Input::has('invoiceno') && Input::get('invoiceno') != ''){
			$data = SalesDetails::where('invoice_no', Input::get('invoiceno'))
								->where('product_id', Input::get('productid'))
								->where('option_id', Input::get('optionid'))
								->first();
								// return $data[0]->product_qty;
			if(!empty($data)){
				$oldqty = $data->product_qty;
				$oldamt = $data->amount;
				$data->product_qty = $oldqty + Input::get('unit');
				// $data->amount = $oldamt + Input::get('subtotal');
				$data->update();
				return $data;
			}
		}else{
			$salesdetails = new SalesDetails;
			$salesdetails->product_id = Input::get('productid');
			$salesdetails->option_id = Input::get('optionid');
			$salesdetails->product_name = Input::get('option');
			$salesdetails->product_qty = Input::get('unit');
			$salesdetails->amount = Input::get('price');
			$salesdetails->invoice_no = uniqid();
			$salesdetails->save();

			return ['invoice_no' => $salesdetails->invoice_no, 'status' => 1];
		}
	}
}
?>