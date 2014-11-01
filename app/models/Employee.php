<?php 

	class Employee extends Eloquent{
		protected $table = 'employee';
		protected $softDelete = true;
		protected $fillable = array('type','salary','post','joined_date','person_id');
		protected $primaryKey = 'employee_id';

		public function persons(){
			return $this->belongsTo('Person', 'employee_id', 'person_id');
		}

	}
?>