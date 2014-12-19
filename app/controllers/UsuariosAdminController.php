<?php

class UsuariosAdminController extends BaseController {
	/**
	 * muestra el formulario de login para iniciar secion
	 * @return [View]
	 */
	public function viewLogin(){
		return View::make('administrador.login');

	}

	/**
	 * [viewUpdate description]
	 * @return [type] [description]
	 */
	public function viewUpdate($id){
		$user = User::find($id);
		return View::make('admin.viewUsuario')->with('user', $user);
	}

	/**
	 * guarda el usuario en la BD
	 * @return [type]
	 */
	public function save(){
		if($this->validateForms(Input::all()) === true){
			$user = new User();
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));	
			$user->role_id = Input::get('rol');

			$useradmin = new UsuarioAdmin();
			$useradmin->nombres = Input::get('nombres');
			$useradmin->apellidos = Input::get('apellidos');
			$useradmin->email = Input::get('email');
			$useradmin->cargo = Input::get('cargo');

			$user->save();
			$user->usuarioadmin()->save($useradmin);

			Session::flash('message', 'Usuario Agregado');
			return Redirect::back();

		}else{
			return Redirect::back()->withErrors($this->validateForms(Input::all()))->withInput();
		}
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update($id){
		if($this->validateForms(Input::all()) === true){

			$user = User::find($id);
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));	
			$user->role_id = Input::get('rol');

			$useradmin = UsuarioAdmin::where('usuario_id', $id)->first();
			$useradmin->nombres = Input::get('nombres');
			$useradmin->apellidos = Input::get('apellidos');
			$useradmin->email = Input::get('email');
			$useradmin->cargo = Input::get('cargo');

			$user->save();
			$user->usuarioadmin()->save($useradmin);			

			Session::flash('message', 'Usuario Modificado');
			return Redirect::back();
			
		}else{
			return Redirect::back()->withErrors($this->validateForms(Input::all()))->withInput();
		}
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete($id){
		$user = User::find($id);
		$useradmin = UsuarioAdmin::where('usuario_id', $id);

		$user->delete();
		$useradmin->delete();

		Session::flash('message', 'Usuario Eliminado');
		return Redirect::back();
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
				if(Auth::user()->role_id == 0){
					return Redirect::to('administrador');
				}else{
					return Redirect::to('/');
				}
				
			}else{
				Session::flash('message', 'Error al iniciar session');
				return Redirect::to('login');
			}
		}else{
			return Redirect::to('login')->withErrors($this->validateFormsLogin(Input::all()))->withInput();		
		}				
	}

	private function validateForms($inputs = array()){
		$rules = array(
			'nombres' => 'required|min:2',
			'apellidos' => 'required|min:2',
			'email' => 'required',	
			'cargo' => 'required',	
			'username' => 'unique:usuarios|required|min:4',			
			'password' => 'confirmed|required|between:6,12',
			'password_confirmation' => 'required|between:6,12'	
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