<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->text('content');
			$table->string('thumbnail');
			$table->integer('user_id');
			$table->integer('tag_id');

			$table->timestamps();
		});
		DB::statement('ALTER TABLE posts ADD FULLTEXT search(title, content)');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->dropIndex('search');
			$table->drop();
		});
	}

}
