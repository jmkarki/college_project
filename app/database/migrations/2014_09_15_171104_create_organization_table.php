<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organization', function(Blueprint $table)
		{
			$table->increments('org_id');
			$table->string('org_name');
			$table->string('location');
			$table->string('pan_no');
			$table->string('vat_no');
			$table->string('registration');
			$table->integer('type');
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
		Schema::drop('organization');
	}

}
