<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosdatosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuariosdatos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombres');
			$table->string('apellidos');
			$table->string('fecha_nacimiento');	
			$table->string('estado_civil');
			$table->string('genero');
			$table->string('nacionalidad');
			$table->string('tipo_identificacion');
			$table->string('no_identificacion');
			$table->string('departamento');
			$table->text('direccion');
			$table->string('convencional');
			$table->string('celular');
			$table->boolean('vehiculo');
			$table->string('categoria_licencia');
			$table->string('disponible_viajar');
			$table->string('foto');
			$table->text('objetivo');
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
		Schema::drop('usuariosdatos');
	}

}
