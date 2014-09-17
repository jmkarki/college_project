<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_master', function(Blueprint $table)
		{
			$table->increments('sales_id');
			$table->timestamp('sales_date');
			$table->integer('customer_id');
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
		Schema::drop('sales_master');
	}

}
