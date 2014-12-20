<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioscontactosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarioscontactos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_contacto');
			$table->string('telefono_contacto');
			$table->string('email_contacto');
			$table->integer('usuario_experiencia_id');
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
		Schema::drop('usuarioscontactos');
	}

}
