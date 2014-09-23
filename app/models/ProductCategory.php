<?php 

	class ProductCategory extends Eloquent{
		protected $table = 'product_category';
		protected $softDelete = true;
		protected $fillable = array('category_name','parent_id');
		protected $primaryKey = 'category_id';


	}
?>