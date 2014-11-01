<?php 

	class Supplier extends Eloquent{
		protected $table = 'supplier';
		protected $softDelete = true;
		protected $fillable = array('type','person_id');
		protected $primaryKey = 'supplier_id';

		public function persons(){
			return $this->belongsTo('Person', 'supplier_id', 'person_id');
		}

	}
?>