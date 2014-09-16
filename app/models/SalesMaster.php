<?php 

	class SalesMaster extends Eloquent{
		protected $table = 'sales';
		protected $softDelete = true;
		protected $fillable = array('sales_date','customer_id','gross_amount','discount','total','payment_mode');
		protected $primaryKey = 'sales_id';


	}
?>