<?php 

	class Cheque extends Eloquent{
		protected $table = 'cheque';
		protected $softDelete = true;
		protected $fillable = array('cheque_no','account_no','issued_date', 'due_date','bank_name', 'amount','beneficiary','payment_type','customer_id','supplier_id','cashed_date','drawee_name','cheque_name','status');
		protected $primaryKey = 'cheque_id';


	}
?>