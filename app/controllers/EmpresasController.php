<?php

class EmpresasController extends BaseController {

	/**
	 * [viewEmpresas description]
	 * @return [type] [description]
	 */
	public function view(){
		$empresas = Empresa::all();
		return View::make('admin.empresas')->with('empresas', $empresas);
	}

	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save()
	{

		if($this->ValidateForms(Input::all()) === true){

			$user = new User(); 
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->enable = 0;
			$user->email = Input::get('email');
			$user->role_id = 2;

			$file = 'noimg.png';
			$empresa = new Empresa();

			$empresa->nombre = Input::get('nombre');
			$empresa->actividad = Input::get('actividad');
			$empresa->pagina = Input::get('pagina');
			$empresa->telefono = Input::get('telefono');
			
			if(Input::hasFile('archivo')) {
				File::delete('img/upload/'. $empresa->logo);
		       	Input::file('archivo')->move('img/upload', Input::get('nombre') . Input::file("archivo")->getClientOriginalName());
		       	$file = Input::get('nombre') . Input::file("archivo")->getClientOriginalName();
			}

			$empresa->logo = $file;

			$user->save();
			$user->usuarioempresa()->save($empresa);

			Session::flash('message', 'Solicitud enviada, espere la respuesta del administrador');
			return Redirect::back();

		}else{
			return Redirect::back()->withErrors($this->validateForms(Input::all()))->withInput();
		}
	}

	/**
	 * [viewUpdate description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function viewUpdate($id){
		$empresa = Empresa::find($id);
		return View::make('admin.empresaupdate')->with('empresa', $empresa);
	}	

	/**
	 * [updateadmin description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function updateadmin($id){
		$empresa = Empresa::find($id);
		$user = User::where('id', $empresa->usuario_id)->first();

		$puestos = implode(',',$_POST['puestos']); 
		$empresa->puestos = $puestos;

		$user->enable = 1;

		$user->save();
		$user->usuarioempresa()->save($empresa);

		Session::flash('message', 'Puestos agregados exitosamente');
		return Redirect::back();
	}

	public function activo($id){
		$empresa = Empresa::find($id);
		$user = User::where('id', $empresa->usuario_id)->first();
		$msj = '';

		if($user->enable == 0){
			$user->enable = 1;
			$msj = 'Empresa Habilitada';
		}else{
			$user->enable = 0;
			$msj = 'Empresa Deshabilitada';
		}

		$user->save();

		Session::flash('message', $msj);
		return Redirect::back();
	}

	
	/**
	 * [validateForms description]
	 * @param  array  $inputs [description]
	 * @return [type]         [description]
	 */
	private function validateForms($inputs = array()){
		$rules = array(
			'nombre' => 'required|min:2',
			'actividad' => 'required|min:2',
			'pagina' => 'required',	
			'telefono' => 'required',
			'email' => 'required|unique:usuarios',
			'username' => 'unique:usuarios|required|min:4',			
			'password' => 'required|between:6,12'			
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
}
?>