<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPlanCompletePaymentIdHashToCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company', function(Blueprint $table)
		{
			$table->string('plan')->after('url');
			$table->string('complete')->after('plan');
			$table->string('payment_id')->after('complete');
			$table->string('hash')->after('payment_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company', function(Blueprint $table)
		{
			$table->dropColumn('plan');
			$table->dropColumn('complete');
			$table->dropColumn('payment_id');
			$table->dropColumn('hash');
		});
	}

}
