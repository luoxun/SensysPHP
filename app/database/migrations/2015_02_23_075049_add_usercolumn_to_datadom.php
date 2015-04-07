<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsercolumnToDatadom extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::collection('datadom',function($table)
		{
			$table->enum('user_validation',array('pos','neg','neu'));
		});
	}
}
