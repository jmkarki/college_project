<?php 

	class Customer extends Eloquent{
		protected $table = 'customer';
		protected $softDelete = true;
		protected $fillable = ['type','person_id'];
		protected $primaryKey = 'customer_id';

 	}
?>