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
}
?>