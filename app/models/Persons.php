<?php 

	class Persons extends Eloquent{
		protected $table = 'person';
		protected $softDelete = true;
		protected $fillable = array('full_name','address','gender','date_birth','status');
		protected $primaryKey = 'person_id';


		public function suppliers(){
		return $this->hasMany('Supplier');
		}
		public function customers(){
		return $this->hasMany('Customer');
		}

		public function employees(){
		return $this->hasMany('Employee');
		}

	}
?>