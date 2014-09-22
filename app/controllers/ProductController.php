<?php
class ProductController extends BaseController{
	public function getIndex(){
		return View::make('product.product');
	}
}
?>