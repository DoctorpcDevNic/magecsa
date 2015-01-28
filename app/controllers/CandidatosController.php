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
			'nombres' => 'required',
			'apellidos' => 'required',
			'fecha_nacimiento' => 'required',
			'estado_civil' => 'required',
			'genero' => 'required',
			'nacionalidad' => 'required',
			'tipo_identificacion' => 'required',
			'no_identificacion' => 'required',
			'departamento' => 'required',
			'direccion' => 'required',
			'email' => 'required|unique:usuarios',
			'objetivo' => 'required|max:200',
			'interes_laboral' => 'required',
			'expectativa_salarial' => 'required',
			'nombre_empresa' => 'required',
			'actividad_empresa' => 'required',
			'area' => 'required',
			'puesto' => 'required',
			'logros' => 'max:200',
			'fecha_inicio' => 'required',
			'fecha_fin' => 'required',
			'funciones' => 'required|max:200',
			'nivel_academico' => 'required',
			'titulo' => 'required',
			'instituto' => 'required',			
		);

		$message = array(
			'required' => 'El campo :attribute es requerido',
			'unique' => 'El :attribute ya esta en uso',
			'max' => 'El campo :attribute tienen un limite de 200 caracteres'	
		);


		$validate = Validator::make(Input::all(), $rules, $message);

		if($validate->fails()){
			return Redirect::back()->withErrors($validate)->withInput();
		}else{

			$user->username = Input::get('username');
			$user->password =  Hash::make(Input::get('password'));
			$user->email = Input::get('email');
			$user->enable = 1;
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
			

			if(Input::get('superior') == 1){//si hay
				$contacto = new UsuarioContacto();
				$contacto->nombre_contacto = Input::get('nombre_contacto');
				$contacto->telefono_contacto = Input::get('telefono_contacto');
				$contacto->email_contacto = Input::get('email_contacto');
			}

			$usereduca->nivel_academico = Input::get('nivel_academico');
			$usereduca->titulo = Input::get('titulo');
			$usereduca->instituto = Input::get('instituto');
			$usereduca->fecha_finalizacion = Input::get('fecha_finalizacion');

			$userotro->idioma = Input::get('idioma');
			$userotro->nivel_dominio = Input::get('nivel_dominio');
			$userotro->habilidad1 = Input::get('habilidad1');
			$userotro->nivel_dominio1 = Input::get('nivel_dominio1');
			$userotro->habilidad2 = Input::get('habilidad2');
			$userotro->nivel_dominio2 = Input::get('nivel_dominio2');
			$userotro->habilidad3 = Input::get('habilidad3');
			$userotro->nivel_dominio3 = Input::get('nivel_dominio3');

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
			if(Input::get('superior') == 1){//si hay
				$userexper->usuariocontacto()->save($contacto);
			}
			$user->usuarioeducacion()->save($usereduca);
			$user->usuariootro()->save($userotro);
			//$user->usuariohabilidad()->save($userhab);

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
				'funciones' => 'required|max:150',
			);

			$message = array(
				'required' => 'El campo :attribute es requerido',	
				'max' => 'El campo :attribute tienen un limite de 200 caracteres'				
			);

			$validator = Validator::make(Input::all(), $rules, $message);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator)->withInput();
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
				return Redirect::back()->withErrors($validator)->withInput();
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
				return Redirect::back()->withErrors($validator)->withInput();
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
				'nombres' => 'required',
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
				return Redirect::back()->withErrors($validator)->withInput();
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
				$userdato->vehiculo = Input::get('vehiculo');

				$categorias = implode(',',$_POST['categoria_licencia']); 
				$userdato->categoria_licencia = $categorias;

				$userdato->disponible_viajar = Input::get('disponible_viajar');
				$userdato->objetivo = Input::get('objetivo');

				$user->email = Input::get('email');
				$user->save();		
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
				return Redirect::back()->withErrors($validator)->withInput();
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
				'logros' => 'max:400',
				'fecha_inicio' => 'required',
				'fecha_fin' => 'required',
				'funciones' => 'required|max:400',
			);

			$message = array(
				'required' => 'El campo :attribute es requerido',
				'max' => 'El campo :attribute tienen un limite de 200 caracteres'					
			);

			$validator = Validator::make(Input::all(), $rules, $message);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator)->withInput();
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
				$userexper->contacto = Input::get('superior');

				if(Input::get('superior') == 1){//si hay
					$contacto = new UsuarioContacto();
					$contacto->nombre_contacto = Input::get('nombre_contacto');
					$contacto->telefono_contacto = Input::get('telefono_contacto');
					$contacto->email_contacto = Input::get('email_contacto');
				}

				$user->usuarioexperiencia()->save($userexper);
				if(Input::get('superior') == 1){//si hay
					$userexper->usuariocontacto()->save($contacto);
				}

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
				return Redirect::back()->withErrors($validator)->withInput();
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
		       	Input::file('archivo')->move('img/upload', 'avatar'.Auth::user()->username).'.jpg';
		       	$file = 'avatar'.Auth::user()->username .'.jpg';

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
				if(Auth::user()->role_id == 0){//admin
					return Redirect::to('administrador');
				}else if(Auth::user()->role_id == 1){//empleado
					return Redirect::to('administrador');
				}else if(Auth::user()->role_id == 2){//empresa	
					if(Auth::user()->enable == 1){
						return Redirect::to('MasServicios');	
					}else{
						Session::flash('message', 'El administrador ya esta revisando su solicitud, se le comunicara cuando su usuario este activo');
						return Redirect::to('login');
					}				
					
				}else if(Auth::user()->role_id == 3){//candidato
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

	public function rememberpass(){
		$seleccionado = Input::get('tipo');
		$nombre = Input::get('nombre');

		if($seleccionado == 'username'){
			$user = User::where('username', $nombre)->first();

			if(!$user){
				Session::flash('message', 'Usuario no encontrado');
				return Redirect::back();
			}else{

				$codigo = $this->generarCodigo(40);

				$data = array(
					'email' => 'http://masempleosyservicios.com.ni/login/nueva/password/'.$codigo,
					);				

				Mail::send('emails.rememberpass', $data, function($message) use ($user){
				    $message->to($user->email, 'MAGECSA')->subject('MAGECSA - Recuperar Contraseña');
				});

				$user->remember_pass = $codigo;
				$user->save();

				Session::flash('message', 'La nueva contraseña fue enviada a su email');
				return Redirect::to('login');
			}		

		}elseif($seleccionado == 'email'){
			$user = User::where('email', $nombre)->first();
			if($user){
				
				$codigo = $this->generarCodigo(40);

				$data = array(
					'email' => 'http://masempleosyservicios.com.ni/login/nueva/password/'.$codigo,
					);				

				Mail::send('emails.rememberpass', $data, function($message) use ($user){
				    $message->to($user->email, 'MAGECSA')->subject('MAGECSA - Recuperar Contraseña');
				});

				$user->remember_pass = $codigo;
				$user->save();

				
				Session::flash('message', 'La nueva contraseña fue enviada a su email');
				return Redirect::to('login');
			}else{
				Session::flash('message', 'Email no encontrado');
				return Redirect::back();
			}
		}else{
			return Redirect::back();
		}
	}

	/**
	 * [newpass description]
	 * @return [type] [description]
	 */
	public function newpass(){
		$rules = array(				
			'password' => 'confirmed|required',
			'password_confirmation' => 'required'	
		);

		$message = array(
			'required' => 'El campo :attribute es requerido',	
			'confirmed' => 'Las contraseñas no coinciden'			
		);

		$validator = Validator::make(Input::all(), $rules, $message);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}else{
		
			$id = Input::get('id_usuario');
			$user = User::find($id);

			$user->password = Hash::make(Input::get('password'));	

			$user->save();

			Session::flash('message', 'Contraseña cambiada puede iniciar sesion');
			return Redirect::to('login');
		}	
	}

	public function deleteexperiencia($id){
		$experiencia = UsuarioExperiencia::find($id);

		$experiencia->delete();
		Session::flash('message', 'Experiencia Borrada');
		return Redirect::back();
	}

	public function deleteeducacion($id){
		$educacion = UsuarioEducacion::find($id);

		$educacion->delete();
		Session::flash('message', 'Educacion Borrada');
		return Redirect::back();
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
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz$&@ABCDEFGHIJKLMNOPQRSTUVWXYZ.,';
		$max = strlen($pattern)-1;
		for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
		return $key;
	}
}
?>		