<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTitleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('title', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('employee_id');
			$table->string('title');
			$table->timestamp('started_from');
			$table->timestamp('ended_at');			
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
		Schema::drop('title');
	}

}
