<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddOptionDescriptionToProductOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_option', function(Blueprint $table)
		{
			$table->string('option_description')->after('option_name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_option', function(Blueprint $table)
		{
			$table->dropColumn('option_description');
		});
	}

}
