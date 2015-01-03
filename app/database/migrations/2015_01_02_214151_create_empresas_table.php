<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('actividad');
			$table->string('pagina');
			$table->string('telefono');
			$table->string('email');
			$table->string('logo');
			$table->text('puestos');
			$table->string('username');
			$table->string('password');	
			$table->integer('activo');	
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
		Schema::drop('empresas');
	}

}
