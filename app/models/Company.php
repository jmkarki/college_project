<?php 

	class Company extends Eloquent{
		protected $table = 'company';
		protected $softDelete = true;
		protected $fillable = array('org_id');
		protected $primaryKey = 'company_id';


	}
?>