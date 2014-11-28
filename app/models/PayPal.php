<?php

class PayPal extends \Eloquent {
	protected $fillable = ['company_id','payment_id','hash','complete'];
	protected $table = 'paypal_transaction';
}