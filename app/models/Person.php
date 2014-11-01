<?php 

	class Person extends Eloquent{
		protected $table = 'person';
		protected $softDelete = true;
		protected $fillable = array('full_name','address','gender','date_birth','status');
		protected $primaryKey = 'person_id';

		public function company(){
			return $this->belongsTo('Company');
		}

		public function customer(){
			return $this->hasMany('Customer');
		}
		public function supplier(){
			return $this->hasMany('Supplier');
		}
		public function employee(){
			return $this->hasMany('Employee');
		}
	}
?>