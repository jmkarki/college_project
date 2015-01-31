<?php
class PurchaseController extends BaseController{

	private $userDetail;
	public function __construct(){
		$image = new Image;
		$this->userDetail = ['img'=>$image->imgloc(Auth::user()->image_id),
					'name' => Auth::user()->name];
	}	
	public function getIndex(){
		$supplierlist = [];
		$suppliers = Supplier::with('persons')->get();
		foreach ($suppliers as $each) {
			if($each['persons']->company_id == Session::get('company_id')){
				array_push($supplierlist, $each);
			}
		}
		$items = Company::with('products')->where('company_id', Session::get('company_id'))->get();
		return View::make('purchase.purchase')
					->with(['current'=>'',
							'userDet' => $this->userDetail,
							'suppliers' => $supplierlist,
							'items' => $items[0]['products']]);
	}

	public function postProductoption(){
		$data = [];
		$product = Product::with('option')->where('product_id', Input::get('id'))->first();
		return $product['option'];
		
		// foreach ($product['option'] as $each) {
		// 	$data['option_id'] = $each->option_id;
		// 	$data['option_name'] = $each->option_name;
		// 	$data['option_price'] = Option::with('price')->where('option_id', $each->option_id)->first()['price'];
		// }
		// return $data;
	}
}
?>