<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpployeeDepartmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empployee_department', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('employee_id');
			$table->timestamp('started_from');
			$table->timestamp('ended_at');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empployee_department');
	}

}
