<?php 

	class Customer extends Eloquent{
		protected $table = 'customer';
		protected $softDelete = true;
		protected $fillable = ['type','person_id'];
		protected $primaryKey = 'customer_id';

		public function persons(){
			return $this->belongsTo('Person', 'customer_id', 'person_id');
		}

 	}
?>