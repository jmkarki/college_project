<?php 

	class PurchaseDetail extends Eloquent{
		protected $table = 'purchase_detail';
		protected $softDelete = true;
		protected $fillable = array('product_id','product_name','product_qty','amount');
		protected $primaryKey = 'purchase_id';


	}
?>