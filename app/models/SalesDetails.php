<?php 

	class SalesDetails extends Eloquent{
		protected $table = 'sales_details';
		protected $softDelete = true;
		protected $fillable = array('product_id','product_name','product_qty','unit','invoice_no','amount');
		protected $primaryKey = 'sales_id';


	}
?>