<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddDescriptionToProductBrandTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_brand', function(Blueprint $table)
		{
			$table->string('description')->after('brand_name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_brand', function(Blueprint $table)
		{
			Schema::drop('product_brand');
		});
	}

}
