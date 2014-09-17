<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_master', function(Blueprint $table)
		{
			$table->increments('purchase_id');
			$table->integer('purchase_date');
			$table->integer('supplier_id');
			$table->integer('gross_amount');
			$table->integer('discount');
			$table->integer('total');
			$table->string('payment_mode');
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
		Schema::drop('purchase_master');
	}

}
