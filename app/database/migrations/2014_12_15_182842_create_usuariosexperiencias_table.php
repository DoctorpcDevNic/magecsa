<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosexperienciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuariosexperiencias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_empresa');
			$table->string('actividad_empresa');
			$table->string('telefono');
			$table->string('area');
			$table->string('puesto');
			$table->string('fecha_inicio');
			$table->string('fecha_fin');
			$table->text('logros');
			$table->string('funciones');
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
		Schema::drop('usuariosexperiencias');
	}

}
