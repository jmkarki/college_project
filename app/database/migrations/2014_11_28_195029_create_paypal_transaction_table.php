<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaypalTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paypal_transaction', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id');
			$table->integer('payment_id');
			$table->string('hash');
			$table->integer('complete');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('paypal_transaction');
	}

}
