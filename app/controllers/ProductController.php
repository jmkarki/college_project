<?php
class ProductController extends BaseController{
	public function getIndex(){
		$company_id = Session::get('company_id');
 		$parents = Company::find(Session::get('comapany_id'))->category;
 		$brands = Company::find(Session::get('comapany_id'))->brand;
		
		return View::make('product.product')->with(array('parents' => $parents,'brands'=>$brands));
 	}
	public function postBrand(){
		$brand = new Brand;
		$brand->company_id = Session::get('company_id');
		$brand->brand_name = Input::get('brand_name');
		$brand->description = Input::get('description');
		$brand->save();

		return Redirect::to('product')->with('message','New brand name recently added.');

	}

	public function postCategory(){
		$category = new Category;
		$category->company_id = Session::get('comapany_id');
		$category->category_name = Input::get('category_name');
		$category->description = Input::get('description');
		$category->parent_id = Input::get('select_parent');
		$category->save();

		return Redirect::to('/product')->with('message','New category recently added.');
	}
}
?>