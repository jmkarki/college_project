<?php 

	class PurchaseMaster extends Eloquent{
		protected $table = 'purchase_master';
		protected $softDelete = true;
		protected $fillable = array('purchase_date','supplier_id','gross_amount','discount','total','payment_mode');
		protected $primaryKey = 'purchase_id';


	}
?>