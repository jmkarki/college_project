<?php
class ProductController extends BaseController{
	public function getIndex(){
		return View::make('product.product');
	}
	public function postBrand(){
		$brand = new ProductBrand;
		$brand->company_id = Session::get('company_id');
		$brand->brand_name = Input::get('brand_name');
		$brand->save();

		return Redirect::to('product')->with('message','New brand name recently added.');

	}
}
?>