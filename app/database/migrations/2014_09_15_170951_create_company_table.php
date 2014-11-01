<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company', function(Blueprint $table)
		{
			$table->increments('company_id');
			$table->string('company_name');
			$table->string('owner_name');
			$table->string('address');
			$table->string('email');
			$table->string('phone');
			$table->string('mobile');
			$table->string('logo');
			$table->string('url');
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
		Schema::drop('company');
	}

}
