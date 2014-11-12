<?php

class Option extends Eloquent {
	protected $fillable = ['option_name','description','product_id'];
	protected $table = 'product_option';
	protected $primaryKey = 'option_id';
	protected $softDelete = true;
}