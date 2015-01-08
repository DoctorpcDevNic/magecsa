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
			$table->text('departamento');
			$table->text('requisitos');
			$table->text('descripcion');			
			$table->text('area_interes');
			$table->string('logo');
			$table->boolean('enable');//0->no; 1->si
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
