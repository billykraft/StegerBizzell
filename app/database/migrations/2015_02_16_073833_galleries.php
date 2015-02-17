<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Galleries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galleries', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('gallery_id');
			$table->timestamps();
			$table->string('directory', 100);
			$table->decimal('folder', 20, 2);

			$table->string("name",255);
			$table->text("description");
			$table->string("cover",255);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('galleries');
	}

}
