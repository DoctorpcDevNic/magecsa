<?php

class CandidatosController extends BaseController {

	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){
		$user = new User();
		$userdato = new UsuarioDato();
		$userexpec = new UsuarioExpectativa();
		$userexper = new UsuarioExperiencia();
		$usereduca = new UsuarioEducacion();
		$userotro = new UsuarioOtro();
		$userhab = new UsuarioHabilidad();
		


		$user->username = Input::get('username');
		$user->password =  Hash::make(Input::get('password'));
		$user->role_id = 3;

		$userdato->nombres = Input::get('nombres');
		$userdato->apellidos = Input::get('apellidos');
		$userdato->fecha_nacimiento = Input::get('fecha_nacimiento');
		$userdato->estado_civil = Input::get('estado_civil');
		$userdato->genero = Input::get('genero');
		$userdato->nacionalidad = Input::get('nacionalidad');
		$userdato->tipo_identificacion = Input::get('tipo_identificacion');
		$userdato->no_identificacion = Input::get('no_identificacion');
		$userdato->departamento = Input::get('departamento');
		$userdato->direccion = Input::get('direccion');
		$userdato->convencional = Input::get('convencional');
		$userdato->celular = Input::get('celular');
		$userdato->email = Input::get('email');
		$userdato->vehiculo = Input::get('vehiculo');

		$categorias = implode(',',$_POST['categoria_licencia']); 
		$userdato->categoria_licencia = $categorias;

		$userdato->disponible_viajar = Input::get('disponible_viajar');
		$userdato->objetivo = Input::get('objetivo');
		//$userdato->foto = Input::get('foto');
		
		$userexpec->interes_laboral = Input::get('interes_laboral');
		$userexpec->expectativa_salarial = Input::get('expectativa_salarial');
		$userexpec->ubicacion_laboral = Input::get('ubicacion_laboral');
		$userexpec->areas_interes = Input::get('areas_interes');
		$userexpec->puesto_interes = Input::get('puesto_interes');
		$userexpec->horario = Input::get('horario');

		$userexper->nombre_empresa = Input::get('nombre_empresa');
		$userexper->actividad_empresa = Input::get('actividad_empresa');
		$userexper->telefono_empresa = Input::get('telefono_empresa');
		$userexper->area = Input::get('area');
		$userexper->puesto = Input::get('puesto');
		$userexper->fecha_inicio = Input::get('fecha_inicio');
		$userexper->fecha_fin = Input::get('fecha_fin');
		$userexper->logros = Input::get('logros');
		$userexper->funciones = Input::get('funciones');

		$usereduca->nivel_academico = Input::get('nivel_academico');
		$usereduca->titulo = Input::get('titulo');
		$usereduca->instituto = Input::get('instituto');
		$usereduca->fecha_finalizacion = Input::get('fecha_finalizacion');

		$userotro->idioma = Input::get('idioma');
		$userotro->nivel_dominio = Input::get('nivel_dominio');

		$userhab->base_datos = Input::get('base_datos');
		$userhab->frameworks = Input::get('frameworks');
		$userhab->lenguajes_programacion = Input::get('lenguajes_programacion');
		$userhab->programas_aplicacion = Input::get('programas_aplicacion');
		$userhab->programas_diseno = Input::get('programas_diseno');
		$userhab->sistemas_operativos = Input::get('sistemas_operativos');

		$user->save();
		$user->usuariodato()->save($userdato);
		$user->usuarioexpectativa()->save($userexpec);
		$user->usuarioexperiencia()->save($userexper);
		$user->usuarioeducacion()->save($usereduca);
		$user->usuariootro()->save($userotro);
		$user->usuariohabilidad()->save($userhab);

		Session::flash('message', 'Usuario Agregado');
		return Redirect::back();
		
	}
}

?>	
	