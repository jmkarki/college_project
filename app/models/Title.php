<?php

class Title extends Eloquent {
	protected $fillable = ['employee_id','title','salary','department_id','started_from','ended_at'];
	protected $table = 'title';

	public function employee(){
		return $this->belongsTo('Employee');
	}

	public function department(){
		return $this->hasMany('Department');
	}
}