<?php

class Price extends Eloquent {
	protected $fillable = ['option_id','purchase_date','lot_no','batch_no','manufacture_date','expiry_date','cost_price','sell_price','market_price'];
	protected $table = 'product_price';
	protected $primaryKey = 'price_id';
	protected $softDelete = true;

	public function(){
		return $this->hasOne('Option');
	}
}