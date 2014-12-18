<?php

class UsuariosController extends BaseController {
	/**
	 * muestra el formulario de login para iniciar secion
	 * @return [View]
	 */
	public function viewLogin(){
		return View::make('administrador.login');

	}
	/**
	 * guarda el usuario en la BD
	 * @return [type]
	 */
	public function register(){
		if(Input::get()){			
			if($this->validateForms(Input::all()) === true){			
				$user = new User();
				$user->nombre = Input::get('nombre');
				$user->email = Input::get('email');
				$user->username = Input::get('username');				
				$user->password = Hash::make(Input::get('password'));			
				$user->role_id = Input::get('rol');		     		

				if($user->save()){
					
					Session::flash('message', 'Usuario Registrado con exito');
					return Redirect::back();
				}
			}else{
				return Redirect::to('administrador/usuarios')->withErrors($this->validateForms(Input::all()))->withInput();
			}
		}else{
			return View::make('usuarios.login');
		}
	}

	public function del($id){
		$usuario = User::find($id);

		$usuario->delete();

		Session::flash('message', 'Usuario Eliminado');
		return Redirect::back();
	}

	/**
	 * valida el login con el username y password
	 * @return [type]
	 */
	public function validateLogin(){
		if($this->validateFormsLogin(Input::all()) === true){
			$userdata = array(
				'username' =>Input::get('username'),
				'password' =>Input::get('password')
				);

			if(Auth::attempt($userdata)){
				if(Auth::user()->role_id == 1){
					return Redirect::to('Archivos');
				}else{
					return Redirect::to('administrador');
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

	
	private function validateForms($inputs = array()){
		$rules = array(
			'nombre' => 'required|min:2',
			'username' => 'unique:usuarios|required|min:4',			
			'password' => 'confirmed|required|between:6,12',
			'password_confirmation' => 'required|between:6,12',			
			'email' => 'required'			
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',
			'unique' => 'El :attribute ya esta en uso'
			);
		$validate = Validator::make($inputs, $rules, $message);

		if($validate->fails()){
			return $validate;
		}else{
			return true;
		}
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