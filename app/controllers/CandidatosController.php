<?php

class CandidatosController extends BaseController {

	/**
	 * [viewPerfil description]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function viewPerfil($username){
		$user = User::where('username', $username)->first();
		return View::make('usuario.perfil')->with('user', $user);
	}

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


	/**
	 * [updatedatoscuenta description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function updatedatoscuenta($id){
		$user = User::find($id);

		if(Auth::user()->id == $id){			

			if($user->username == Input::get('username')){
				$rules = array(
					'username' => 'required',
					'password' => 'confirmed|required',
					'password_confirmation' => 'required'
				);

			}else{
				$rules = array(
					'username' => 'unique:usuarios|required',
					'password' => 'confirmed|required',
					'password_confirmation' => 'required'
				);				
			}

			$message = array(
				'required' => 'El campo :attribute es requerido',
				'unique' => 'El nombre de usuario ya esta en uso'			
			);

			$validator = Validator::make(Input::all(), $rules, $message);

			if ($validator->fails()){				
				return Redirect::back()->withErrors($validator);
			}else{

				$user->username = Input::get('username');
				$user->password = Hash::make(Input::get('password'));;
				$user->save();

				Session::flash('message', 'Usuario Modificado');
				return Redirect::to('Perfil/'. $user->username);

			}		

		}else{
			return Redirect::to('/');
		}
	}

	public function updatedatospersonales($id){
		$user = User::find($id);

		if(Auth::user()->id == $id){	

			$userdato = UsuarioDato::where('usuario_id', $id)->first();

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
					
			$user->usuariodato()->save($userdato);


			Session::flash('message', 'Usuario Modificado');
			return Redirect::back();

		}else{
			return Auth::user()->username;
		}
	}

	public function login(){
		if($this->validateFormsLogin(Input::all()) === true){
			$userdata = array(
				'username' =>Input::get('username'),
				'password' =>Input::get('password')
				);

			if(Auth::attempt($userdata)){
				if(Auth::user()->role_id == 0){
					return Redirect::to('administrador');
				}else if(Auth::user()->role_id == 1){
					return Redirect::to('administrador');
				}else if(Auth::user()->role_id == 2){
					return Redirect::to('administrador');
				}else if(Auth::user()->role_id == 3){
					return Redirect::to('Perfil/' . Auth::user()->username);
				}
			}else{
				Session::flash('message', 'Error al iniciar session');
				return Redirect::to('login');
			}
		}else{
			return Redirect::to('login')->withErrors($this->validateFormsLogin(Input::all()))->withInput();		
		}	
	}

	/**
	 * cierra session
	 * @return [type]
	 */
	public function getLogout(){
		Auth::logout();
		return Redirect::to('/');
	}

	private function validateFormsLogin($inputs = array()){
		$rules = array(			
			'username' => 'required',			
			'password' => 'required',			
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',			
			);
		$validate = Validator::make($inputs, $rules, $message);

		if($validate->fails()){
			return $validate;
		}else{
			return true;
		}
	}
}

?>	
	