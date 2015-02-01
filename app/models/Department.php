<?php

class Department extends Eloquent {
	protected $fillable = ['name'];
	protected $table = 'depatment';

	public function employee(){
		return $this->hasMany('Employee');
	}

	public function department(){
		return $this->belongsTo('Title');
	}
}