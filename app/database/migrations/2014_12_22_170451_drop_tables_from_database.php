<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTablesFromDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('group');
		Schema::dropIfExists('group_resource');
		Schema::dropIfExists('resource');
		Schema::dropIfExists('tag');
		Schema::dropIfExists('members');


	}

}
