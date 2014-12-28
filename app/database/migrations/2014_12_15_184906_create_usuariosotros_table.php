<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosotrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuariosotros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('idioma');
			$table->string('nivel_dominio');
			$table->text('habilidad');	
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
		Schema::drop('usuariosotros');
	}

}
