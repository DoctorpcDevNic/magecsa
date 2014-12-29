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
			$table->string('habilidad1');
			$table->string('nivel_dominio1');	
			$table->string('habilidad2');
			$table->string('nivel_dominio2');	
			$table->string('habilidad3');	
			$table->string('nivel_dominio3');
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
