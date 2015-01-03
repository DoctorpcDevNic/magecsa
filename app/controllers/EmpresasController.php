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

			$file = 'noimg.png';
			$empresa = new Empresa();

			$empresa->nombre = Input::get('nombre');
			$empresa->actividad = Input::get('actividad');
			$empresa->pagina = Input::get('pagina');
			$empresa->telefono = Input::get('telefono');
			$empresa->email = Input::get('email');

			if(Input::hasFile('archivo')) {
				File::delete('img/upload/'. $empresa->logo);
		       	Input::file('archivo')->move('img/upload', Input::get('nombre') . Input::file("archivo")->getClientOriginalName());
		       	$file = Input::get('nombre') . Input::file("archivo")->getClientOriginalName();
			}

			$empresa->logo = $file;
			$empresa->activo = 0;

			$empresa->username = Input::get('username');
			$empresa->password = Hash::make(Input::get('password'));


			$empresa->save();

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


	public function updateadmin($id){
		$user = New User();
		$empresa = Empresa::find($id);

		$user->username = $empresa->username;
		$user->password = $empresa->password;
		$user->role_id = 2;

		$puestos = implode(',',$_POST['puestos']); 
		$empresa->puestos = $puestos;
		$empresa->activo = 1;

		$user->save();
		$user->usuarioempresa()->save($empresa);

		Session::flash('message', 'Empresa Activada y puestos agregados exitosamente');
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
			'email' => 'required',
			'archivo' => 'required',	
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