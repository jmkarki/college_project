<?php
class ProductController extends BaseController{

	public function getIndex(){
  		$category = Company::find(Session::get('company_id'))->category;
 		$brand = Company::find(Session::get('company_id'))->brand;

		return View::make('product.product')
					->with(['category'=>$category,'brand'=>$brand,'current'=>'product']);
 	}
 	public function getBrand(){
 		return View::make('product.new-brand')
 					->with(['current'=>'product']);
 	}
	public function postBrand(){
		$brand = new Brand;
		$brand->company_id = Session::get('company_id');
		$brand->brand_name = Input::get('brand_name');
		$brand->description = Input::get('description');
		$brand->save();

		return Redirect::to('product')
						->with('message','New Brand Recently Added.');

	}
	public function getCategory(){
		$parents = Company::find(Session::get('company_id'))->category;
  		return View::make('product.new-category')
  					->with(['parents'=>$parents,'current'=>'product']);
	}
	public function postCategory(){
		$category = new Category;
		$category->company_id = Session::get('company_id');
		$category->category_name = Input::get('category_name');
		$category->description = Input::get('description');
		$category->parent_id = Input::get('select_parent');
		$category->save();

		return Redirect::to('/product')
						->with('message','New Category Recently Added.');
	}

	public function getBrands(){
		$company = Company::find(Session::get('company_id'));
		$brands = $company->brand;
		return View::make('product.list-brand')
					->with('brands',$brands)
					->with(['current'=>'product']);
	}
	public function getProducts(){
		$company = Company::find(Session::get('company_id'));
		$products = $company->products()->paginate(10);
		return View::make('product.list-product')
					->with(['current'=>'product','products'=>$products]);
	}

	public function getUpdatebrand(){
		$brand = Brand::find(Input::get('brand_id'));
		return $brand;
	}

	public function getCurrentproduct(){
		$product = Product::find(Input::get('product_id'));
		$img = new Image;
		$product->imgUrl = $img->imgloc($product->image_id);
		$option = $product->option;
		foreach ($option as $each) {
			$each->price;
		}
		return $product;
	}

	public function postUpdatebrand(){
		$brand = Brand::find(Input::get('brand_id'));
		$brand->brand_name = Input::get('brand_name');
		$brand->description = Input::get('description');
		$brand->update();

		return Redirect::to('/product/brands')
						->with('message','Brand Information Updated');
	}

	public function postStore(){
		$imgId = 0;
		if(Input::file('uploadImage') != ''){
			$image = new Image;
			$imgData = $image->upload();
			$imgId = $imgData->id;
		}
		$product = new Product;
		$product->company_id = Session::get('company_id');
		$product->product_name = Input::get('product_name');
		$product->brand_id = Input::get('select_brand');
		$product->category_id = Input::get('select_category');
		$product->image_id = $imgId;
		$product->product_description = Input::get('product_description');
		$product->save();

		$option_name = array_filter(Input::get('option_name'));
		$count = count($option_name);
		$option_desc = array_filter(Input::get('option-desc'));
		$purchasedon = array_filter(Input::get('purchasedon'));
		$batchno = array_filter(Input::get('batchno'));
		$lotno = array_filter(Input::get('lotno'));
		$manufacture_date = array_filter(Input::get('manufacture-date'));
		$expiry_date = array_filter(Input::get('expiry-date'));
		$cp = array_filter(Input::get('cp'));
		$sp = array_filter(Input::get('sp'));
		$mp = array_filter(Input::get('mp'));
		for ($i=0; $i < $count; $i++) { 
			$option = new Option;
			$option->option_name = $option_name[$i];
			$option->option_description = $option_desc[$i];
			$option->product_id = $product->product_id;
			$option->save();

			$price = new Price;
			$price->option_id = $option->option_id;
			$price->purchase_date = $purchasedon[$i];
			$price->lot_no = $lotno[$i];
			$price->batch_no = $batchno[$i];
			$price->manufacture_date = $manufacture_date[$i];
			$price->expiry_date = $expiry_date[$i];
			$price->cost_price = $cp[$i];
			$price->sell_price = $sp[$i];
			$price->market_price = $mp[$i];
			$price->save();

		}

		return Redirect::to('/product')
						->with('message','New Product Uploaded.');
	}

	public function getEdit($id = NULL){		
		$product = Product::find($id);
		$product->brandList = Company::find(Session::get('company_id'))->brand->except($product->brand_id);
		$product->categoryList = Company::find(Session::get('company_id'))->category->except($product->category_id);
		$img = new Image;
		$product->imgUrl = $img->imgloc($product->image_id);
		$product->brandName = Brand::find($product->brand_id)->brand_name;
		$product->categoryName = Category::find($product->category_id)->category_name;
		$option = $product->option;
		foreach ($option as $each) {
			$each->price;
		}
		return View::make('product.edit-product')->with(['product'=>$product,'current'=>'product']);
	}

	public function postUpdate($id = NULL){
 		$product = Product::find($id);
		if(Input::get('image_status') == 0){
			$imgId = 1;
		}elseif(Input::get('image_status') == 1){
			$imgId = $product->image_id;
		}
		if(Input::file('uploadImage') != ''){
			$files = new Image;
			$imgDet = $files->upload();
			$imgId = $imgDet->id;
		}
		$product->product_name = Input::get('product_name');
		$product->brand_id = Input::get('select_brand');
		$product->category_id = Input::get('select_category');
		$product->image_id = $imgId;
 		$product->product_description = Input::get('product_description');
		$product->update();

		$option_name = array_filter(Input::get('option_name'));
		$option_id = array_filter(Input::get('option_id'));
		$price_id = array_filter(Input::get('price_id'));
		$count = count($option_name);
 		$option_desc = array_filter(Input::get('option-desc'));
		$purchasedon = array_filter(Input::get('purchasedon'));
		$batchno = array_filter(Input::get('batchno'));
		$lotno = array_filter(Input::get('lotno'));
		$manufacture_date = array_filter(Input::get('manufacture-date'));
		$expiry_date = array_filter(Input::get('expiry-date'));
		$cp = array_filter(Input::get('cp'));
		$sp = array_filter(Input::get('sp'));
		$mp = array_filter(Input::get('mp'));

		for ($i = 1; $i <= $count; $i++) { 
 			if($option_id[$i] > 0){
				$option = Option::find($option_id[$i]);
				$option->option_name = $option_name[$i];
				$option->option_description = $option_desc[$i];
				$option->product_id = $product->product_id;
				$option->update();

				$price = Price::find($price_id[$i]);
				$price->option_id = $option->option_id;
				$price->purchase_date = $purchasedon[$i];
				$price->lot_no = $lotno[$i];
				$price->batch_no = $batchno[$i];
				$price->manufacture_date = $manufacture_date[$i];
				$price->expiry_date = $expiry_date[$i];
				$price->cost_price = $cp[$i];
				$price->sell_price = $sp[$i];
				$price->market_price = $mp[$i];
				$price->update();

			}elseif($option_id[$i] == 0){
				$option = new Option;
				$option->option_name = $option_name[$i];
				$option->option_description = $option_desc[$i];
				$option->product_id = $product->product_id;
				$option->save();

				$price = new Price;
				$price->option_id = $option->option_id;
				$price->purchase_date = $purchasedon[$i];
				$price->lot_no = $lotno[$i];
				$price->batch_no = $batchno[$i];
				$price->manufacture_date = $manufacture_date[$i];
				$price->expiry_date = $expiry_date[$i];
				$price->cost_price = $cp[$i];
				$price->sell_price = $sp[$i];
				$price->market_price = $mp[$i];
				$price->save();
			}
		}
 		return Redirect::to('/product/edit/'.$id)
						->with('message','Product Information Uploaded.');
	}
}
?>