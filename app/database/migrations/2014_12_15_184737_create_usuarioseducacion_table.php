<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioseducacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarioseducacion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nivel_academico');
			$table->string('titulo');
			$table->string('instituto');
			$table->string('fecha_finalizacion');
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
		Schema::drop('usuarioseducacion');
	}

}
