<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddInvoiceNoToSalesDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sales_details', function(Blueprint $table)
		{
			$table->string('invoice_no')->after('unit');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sales_details', function(Blueprint $table)
		{
			$table->dropColumn('invoice_no');
		});
	}

}
