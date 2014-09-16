<?php 

	class Product extends Eloquent{
		protected $table = 'product';
		protected $softDelete = true;
		protected $fillable = array('product_name','brand','serial_no','category_id','cost_price','sell_price','quantity','desc');
		protected $primaryKey = 'product_id';


	}
?>