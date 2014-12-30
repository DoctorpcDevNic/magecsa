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


		$rules = array(
			'username' => 'unique:usuarios|required',
			'password' => 'confirmed|required',
			'password_confirmation' => 'required',
			'nombre' => 'required',
			'apellidos' => 'required',
			'fecha_nacimiento' => 'required',
			'estado_civil' => 'required',
			'genero' => 'required',
			'nacionalidad' => 'required',
			'tipo_identificacion' => 'required',
			'no_identificacion' => 'required',
			'departamento' => 'required',
			'direccion' => 'required',
			'email' => 'required',
			'objetivo' => 'required',
			'interes_laboral' => 'required',
			'expectativa_salarial' => 'required',
			'nombre_empresa' => 'required',
			'actividad_empresa' => 'required',
			'area' => 'required',
			'puesto' => 'required',
			'fecha_inicio' => 'required',
			'fecha_fin' => 'required',
			'funciones' => 'required',
			'nivel_academico' => 'required',
			'titulo' => 'required',
			'instituto' => 'required',			
		);

		$message = array(
			'required' => 'El campo :attribute es requerido',
			'unique' => 'El nombre de usuario ya esta en uso'	
		);


		$validator = Validator::make(Input::all(), $rules, $message);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}else{

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
			$userotro->habilidad = Input::get('habilidad1');
			$userotro->habilidad = Input::get('nivel_dominio1');
			$userotro->habilidad = Input::get('habilidad2');
			$userotro->habilidad = Input::get('nivel_dominio2');
			$userotro->habilidad = Input::get('habilidad3');
			$userotro->habilidad = Input::get('nivel_dominio3');

			/*	
			$userhab->base_datos = Input::get('base_datos');
			$userhab->frameworks = Input::get('frameworks');
			$userhab->lenguajes_programacion = Input::get('lenguajes_programacion');
			$userhab->programas_aplicacion = Input::get('programas_aplicacion');
			$userhab->programas_diseno = Input::get('programas_diseno');
			$userhab->sistemas_operativos = Input::get('sistemas_operativos');
			*/
		
			$user->save();
			$user->usuariodato()->save($userdato);
			$user->usuarioexpectativa()->save($userexpec);
			$user->usuarioexperiencia()->save($userexper);
			$user->usuarioeducacion()->save($usereduca);
			$user->usuariootro()->save($userotro);
			$user->usuariohabilidad()->save($userhab);

			Session::flash('message', 'Usuario Agregado, ya puede iniciar sesion');
			return Redirect::to('login');
		}
	}	

	/**
	 * [addexperiencia description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function addexperiencia($id){
		$user = User::find($id);

		if(Auth::user()->id == $id){	

			$rules = array(				
				'nombre_empresa' => 'required',
				'actividad_empresa' => 'required',
				'area' => 'required',
				'puesto' => 'required',
				'fecha_inicio' => 'required',
				'fecha_fin' => 'required',
				'funciones' => 'required',
			);

			$message = array(
				'required' => 'El campo :attribute es requerido',				
			);

			$validator = Validator::make(Input::all(), $rules, $message);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator);
			}else{

				$userexper = new UsuarioExperiencia();				

				$userexper->nombre_empresa = Input::get('nombre_empresa');
				$userexper->actividad_empresa = Input::get('actividad_empresa');
				$userexper->telefono_empresa = Input::get('telefono_empresa');
				$userexper->area = Input::get('area');
				$userexper->puesto = Input::get('puesto');
				$userexper->fecha_inicio = Input::get('fecha_inicio');
				$userexper->fecha_fin = Input::get('fecha_fin');
				$userexper->logros = Input::get('logros');
				$userexper->funciones = Input::get('funciones');


				$user->usuarioexperiencia()->save($userexper);

				Session::flash('message', 'Usuario Modificado');
				return Redirect::back();
			}
		}else{

			return Redirect::to('/');
		}	
	}

	public function addeducacion($id){
		$user = User::find($id);

		if(Auth::user()->id == $id){	

			$rules = array(				
				'nivel_academico' => 'required',
				'titulo' => 'required',
				'instituto' => 'required',
			);

			$message = array(
				'required' => 'El campo :attribute es requerido',				
			);

			$validator = Validator::make(Input::all(), $rules, $message);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator);
			}else{

				$usereduca = new UsuarioEducacion();				

				$usereduca->nivel_academico = Input::get('nivel_academico');
				$usereduca->titulo = Input::get('titulo');
				$usereduca->instituto = Input::get('instituto');
				$usereduca->fecha_finalizacion = Input::get('fecha_finalizacion');

				$user->usuarioeducacion()->save($usereduca);

				Session::flash('message', 'Usuario Modificado');
				return Redirect::back();
			}	

		}else{
			return Redirect::to('/');	
		}	
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

	/**
	 * [updatedatospersonales description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function updatedatospersonales($id){
		$user = User::find($id);

		if(Auth::user()->id == $id){	

			$rules = array(
				'nombre' => 'required',
				'apellidos' => 'required',
				'fecha_nacimiento' => 'required',
				'estado_civil' => 'required',
				'genero' => 'required',
				'nacionalidad' => 'required',
				'tipo_identificacion' => 'required',
				'no_identificacion' => 'required',
				'departamento' => 'required',
				'direccion' => 'required',
				'email' => 'required',
				'objetivo' => 'required',
			);

			$message = array(
				'required' => 'El campo :attribute es requerido',				
			);


			$validator = Validator::make(Input::all(), $rules, $message);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator);
			}else{

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
			}	

		}else{
			return Redirect::to('/');
		}
	}

	/**
	 * [updateexpectativa description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function updateexpectativa($id){
		$user = User::find($id);

		if(Auth::user()->id == $id){	

			$rules = array(
				'interes_laboral'=> 'required',
				'expectativa_salarial' => 'required',
			);

			$message = array(
				'required' => 'El campo :attribute es requerido',				
			);

			$validator = Validator::make(Input::all(), $rules, $message);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator);
			}else{


				$userexpec = UsuarioExpectativa::where('usuario_id', $id)->first();
				
				$userexpec->interes_laboral = Input::get('interes_laboral');
				$userexpec->expectativa_salarial = Input::get('expectativa_salarial');
				$userexpec->ubicacion_laboral = Input::get('ubicacion_laboral');
				$userexpec->areas_interes = Input::get('areasseleccionadas');
				$userexpec->puesto_interes = Input::get('puesto_interes');
				$userexpec->horario = Input::get('horario');

				$user->usuarioexpectativa()->save($userexpec);

				Session::flash('message', 'Usuario Modificado');
				return Redirect::back();
			}
		}else{
			return Redirect::to('/');	
		}		
	}

	/**
	 * [updateexperiencia description]
	 * @param  [type] $iduser  [description]
	 * @param  [type] $idexper [description]
	 * @return [type]          [description]
	 */
	public function updateexperiencia($iduser, $idexper){
		$user = User::find($iduser);

		if(Auth::user()->id == $iduser){	

			$rules = array(				
				'nombre_empresa' => 'required',
				'actividad_empresa' => 'required',
				'area' => 'required',
				'puesto' => 'required',
				'fecha_inicio' => 'required',
				'fecha_fin' => 'required',
				'funciones' => 'required',
			);

			$message = array(
				'required' => 'El campo :attribute es requerido',				
			);

			$validator = Validator::make(Input::all(), $rules, $message);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator);
			}else{

				$userexper = UsuarioExperiencia::where('usuario_id', $iduser)->get();

				foreach ($userexper as $value) {
					if($value->id == $idexper){
						$userexper = $value;
					}
				}

				$userexper->nombre_empresa = Input::get('nombre_empresa');
				$userexper->actividad_empresa = Input::get('actividad_empresa');
				$userexper->telefono_empresa = Input::get('telefono_empresa');
				$userexper->area = Input::get('area');
				$userexper->puesto = Input::get('puesto');
				$userexper->fecha_inicio = Input::get('fecha_inicio');
				$userexper->fecha_fin = Input::get('fecha_fin');
				$userexper->logros = Input::get('logros');
				$userexper->funciones = Input::get('funciones');


				$user->usuarioexperiencia()->save($userexper);

				Session::flash('message', 'Usuario Modificado');
				return Redirect::back();
			}
		}else{

			return Redirect::to('/');
		}	
	}

	/**
	 * [updateacademica description]
	 * @param  [type] $iduser  [description]
	 * @param  [type] $idacade [description]
	 * @return [type]          [description]
	 */
	public function updateacademica($iduser, $idacade){
		$user = User::find($iduser);

		if(Auth::user()->id == $iduser){	

			$rules = array(				
				'nivel_academico' => 'required',
				'titulo' => 'required',
				'instituto' => 'required',
			);

			$message = array(
				'required' => 'El campo :attribute es requerido',				
			);

			$validator = Validator::make(Input::all(), $rules, $message);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator);
			}else{

				$usereduca = UsuarioEducacion::where('usuario_id', $iduser)->get();

				foreach ($usereduca as $value) {
					if($value->id == $idacade){
						$usereduca = $value;
					}
				}

				$usereduca->nivel_academico = Input::get('nivel_academico');
				$usereduca->titulo = Input::get('titulo');
				$usereduca->instituto = Input::get('instituto');
				$usereduca->fecha_finalizacion = Input::get('fecha_finalizacion');

				$user->usuarioeducacion()->save($usereduca);

				Session::flash('message', 'Usuario Modificado');
				return Redirect::back();
			}	

		}else{
			return Redirect::to('/');	
		}
	}

	/**
	 * [updateotros description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function updateotros($id){
		$user = User::find($id);

		if(Auth::user()->id == $id){	

			$userotro = UsuarioOtro::where('usuario_id', $id)->first();

			$userotro->idioma = Input::get('idioma');
			$userotro->nivel_dominio = Input::get('nivel_dominio');
			$userotro->habilidad1 = Input::get('habilidad1');
			$userotro->nivel_dominio1 = Input::get('nivel_dominio1');
			$userotro->habilidad2 = Input::get('habilidad2');
			$userotro->nivel_dominio2 = Input::get('nivel_dominio2');
			$userotro->habilidad3 = Input::get('habilidad3');
			$userotro->nivel_dominio3 = Input::get('nivel_dominio3');

			$user->usuariootro()->save($userotro);
				
			Session::flash('message', 'Usuario Modificado');
			return Redirect::back();
		}else{
			return Redirect::to('/');	
		}	
			
	}

	/**
	 * [updateavatar description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function updateavatar($id){
		$file = 'no_img.png';
		$user = User::find($id);

		if(Auth::user()->id == $id){	
			$userdato = UsuarioDato::where('usuario_id', $id)->first();


			if(Input::hasFile('archivo')) {
				File::delete('img/upload/'. $userdato->foto);
		       	Input::file('archivo')->move('img/upload', Auth::user()->username . Input::file("archivo")->getClientOriginalName());
		       	$file = Auth::user()->username . Input::file("archivo")->getClientOriginalName();

		       	$userdato->foto = $file;
		       	$user->usuariodato()->save($userdato);

		       	Session::flash('message', 'Usuario Modificado');
				return Redirect::back();

	     	}else{
	     		Session::flash('message', 'No se encontro imagen');
				return Redirect::back();
	     	}			
			
		}else{
			return Redirect::to('/');
		}
	}

	/**
	 * [login description]
	 * @return [type] [description]
	 */
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

	/**
	 * [validateFormsLogin description]
	 * @param  array  $inputs [description]
	 * @return [type]         [description]
	 */
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

	private function generarCodigo($longitud) {
		$key = '';
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
		$max = strlen($pattern)-1;
		for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
		return $key;
	}
}
?>	
	