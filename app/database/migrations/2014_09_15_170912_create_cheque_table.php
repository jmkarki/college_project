<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChequeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cheque', function(Blueprint $table)
		{
			$table->increments('cheque_id');
			$table->integer('cheque_no');
			$table->string('account_no');
			$table->string('cheque_name');
			$table->timestamp('issued_date');
			$table->timestamp('due_date');
			$table->string('bank_name');
			$table->string('amount');
			$table->string('beneficiary');
			$table->string('payment_type');
			$table->integer('customer_id');
			$table->integer('supplier_id');
			$table->string('cashed_date');
			$table->string('drawee_name');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cheque');
	}

}
