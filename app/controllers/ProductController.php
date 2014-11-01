<?php
class ProductController extends BaseController{
	public function getIndex(){
		$company_id = Session::get('company_id');
		$root = array('category_name' => null, 'parent' => '/', 'parent_id' => 0);
		$parents = Category::where('company_id', $company_id)->where('parent_id', 0)->get();
		$brand = ProductBrand::where('company_id',$company_id)->get();

		return View::make('product.product')->with(array('root' => $root,'parents' => $parents,'brand'=>$brand));
		//return View::make('product.product');
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