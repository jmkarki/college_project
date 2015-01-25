<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RemoveTypeSalaryFromEmployee extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('employee', function(Blueprint $table)
		{
			$table->dropColumn('type');
			$table->dropColumn('salary');
			$table->dropColumn('post');
			$table->integer('title_id')->after('person_id');
			$table->integer('salary_id')->after('title_id');
			$table->integer('deparment_id')->after('salary_id');
			$table->timestamp('leave_date')->after('joined_date');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('employee', function(Blueprint $table)
		{
			$table->dropColumn('title_id');
			$table->dropColumn('salary_id');
			$table->dropColumn('deparment_id');
			$table->dropColumn('leave_date');
			$table->integer('type');
			$table->string('salary');
			$table->string('post');
		});
	}

}
