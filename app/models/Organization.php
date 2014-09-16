<?php 

	class Organization extends Eloquent{
		protected $table = 'organization';
		protected $softDelete = true;
		protected $fillable = array('org_name','location','pan_no','vat_no','registration','type');
		protected $primaryKey = 'org_id';


	}
?>