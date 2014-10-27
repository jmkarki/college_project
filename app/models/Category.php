<?php

class Category extends \Eloquent {
	protected $fillable = ['company_id','category_name','parent_id'];
	protected $table = 'product_category';
	protected $primaryKey = 'category_id';
	protected $softDelete = true;

}