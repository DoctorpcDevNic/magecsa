<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVacantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vacantes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('titulo');
			$table->string('fecha');
			$table->text('cuerpo');
			$table->string('logo');
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
		Schema::drop('vacantes');
	}

}
