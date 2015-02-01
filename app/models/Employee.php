<?php 

	class Employee extends Eloquent{
		protected $table = 'employee';
		protected $softDelete = true;
		protected $fillable = array('joined_date','image_id','title_id','department_id','person_id','leave_date','salary_id');
		protected $primaryKey = 'employee_id';

		public function persons(){
			return $this->belongsTo('Person', 'person_id', 'person_id');
		}

		public function title(){
			return $this->hasMany('Title');
		}

		public function department(){
			return $this->belongsTo('Department');
		}



	}
?>