<?php 

	class Person extends Eloquent{
		protected $table = 'person';
		protected $softDelete = true;
		protected $fillable = array('person_name','gender','phone','mobile','fax','email','type');
		protected $primaryKey = 'person_id';


	}
?>