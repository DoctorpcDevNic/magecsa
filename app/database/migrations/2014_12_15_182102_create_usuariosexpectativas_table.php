<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosexpectativasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuariosexpectativas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('interes_laboral');			
			$table->string('expectativa_salarial');
			$table->string('ubicacion_laboral');
			$table->string('areas_interes');
			$table->string('puesto_interes');
			$table->string('horario');
			$table->integer('usuario_id');
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
		Schema::drop('usuariosexpectativas');
	}

}
