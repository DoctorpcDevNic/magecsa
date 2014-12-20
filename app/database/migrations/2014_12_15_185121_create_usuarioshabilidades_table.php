<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioshabilidadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarioshabilidades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('base_datos');
			$table->string('frameworks');
			$table->string('lenguajes_programacion');
			$table->string('programas_aplicacion');
			$table->string('programas_diseno');
			$table->string('sistemas_operativos');
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
		Schema::drop('usuarioshabilidades');
	}

}
