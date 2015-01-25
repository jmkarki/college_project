<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salary', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('employee_id');
			$table->string('salary');
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
		Schema::drop('salary');
	}

}
