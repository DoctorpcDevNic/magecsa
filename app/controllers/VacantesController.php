<?php

class VacantesController extends BaseController {

	/**
	 * [viewUpdate description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function viewUpdate($id){
		$vacante = Vacante::find($id);
		return View::make('admin.vacanteupdate')->with('vacante', $vacante);
	}

	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){

		if($this->ValidateForms(Input::all()) === true){
			$vacante = new Vacante();
			$vacante->titulo = Input::get('titulo');
			$vacante->fecha = Input::get('fecha');
			$vacante->departamento = Input::get('departamento');
			$vacante->requisitos = Input::get('requisitos');
			$vacante->descripcion = Input::get('descripcion');
			$vacante->area_interes = Input::get('area_interes');

			if(Input::hasFile('archivo')) {			
		       	Input::file('archivo')->move('img/upload', Input::get('titulo') . Input::file("archivo")->getClientOriginalName());
		       	$file = Input::get('titulo') . Input::file("archivo")->getClientOriginalName();
			}
			$vacante->logo = $file;

			$vacante->save();

			Session::flash('message', 'Vacante Agregada');
			return Redirect::back();
		}else{
			return Redirect::back()->withErrors($this->validateForms(Input::all()))->withInput();
		}	
	}

	public function aplicarVacante($idvacante, $iduser){
		if(Auth::user()->role_id == 0 || Auth::user()->role_id == 1 || Auth::user()->role_id == 2){
			Session::flash('message', 'Tu usuario no puede aplicar a esta vacante');
			return Redirect::to('MasEmpleos');
		}else{
			$vacanteusuario = new VacanteUsuario();
			$vacanteusuario->vacante_id = $idvacante;
			$vacanteusuario->usuario_id = $iduser;

			$vacanteusuario->save();

			Session::flash('message', 'Vacante Aplicada, revisa todas las vacantes en busca de ¡Mas Empleos!');
			return Redirect::to('MasEmpleos');
		}
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update($id){

		$rules = array(
			'titulo' => 'required|min:2',
			'fecha' => 'required',
			'departamento' => 'required',
			'requisitos' => 'required',
			'descripcion' => 'required',
			'area_interes' => 'required'							
		);
		$message = array(
			'required' => 'El campo :attribute es requerido',
			'unique' => 'El :attribute ya esta en uso'
			);

		$validate = Validator::make(Input::all(), $rules, $message);


		if($validate->fails()){
			return Redirect::back()->withErrors($validate);
		}else{

			$vacante = Vacante::find($id);
			$vacante->titulo = Input::get('titulo');
			$vacante->fecha = Input::get('fecha');
			$vacante->departamento = Input::get('departamento');
			$vacante->requisitos = Input::get('requisitos');
			$vacante->descripcion = Input::get('descripcion');
			$vacante->area_interes = Input::get('area_interes');

			if(Input::hasFile('archivo')) {			
		       	Input::file('archivo')->move('img/upload', Input::get('titulo') . Input::file("archivo")->getClientOriginalName());
		       	$file = Input::get('titulo') . Input::file("archivo")->getClientOriginalName();

		       	$vacante->logo = $file;
			}	

			$vacante->enable = Input::get('enable');		

			$vacante->save();

			Session::flash('message', 'Vacante Actualizado');
			return Redirect::back();
		}
	}

	/**
	 * [viewSeleccionar description]
	 * @param  [string] $username [description]
	 * @param  [integer] $vacante  [description]
	 * @return [type]           [description]
	 */
	public function viewSeleccionar($username, $vacante){
		$user = User::where('username', $username)->first();

		if($vacante == 'todas'){
			$vacante = Vacante::where('enable', 1)->get();
		}else{
			$vacante = Vacante::find($vacante);
		}
		

		return View::make('admin.seleccionar', array('user'=>$user, 'vacante'=>$vacante));	
	
	}

	/**
	 * [Seleccionar description]
	 * @param [integer] $username [userid]
	 * @param [integer] $vacante  [vacanteid]
	 */
	public function Seleccionar($username, $vacante){
		$user = User::find($username);
		$vacante = Vacante::find($vacante);
	
		$seleccionar = new VacanteSeleccionar();
		$seleccionar->usuario_id = $user->id;
		$seleccionar->vacante_id = $vacante->id;


		$seleccionar->save();

		return Redirect::back();
	}

	
	public function quitar($username, $vacante){
		$user = User::find($username);
		$vacante = Vacante::find($vacante);
	
		$seleccionar = VacanteSeleccionar::where('usuario_id', $user->id)->where('vacante_id', $vacante->id)->first();		

		$seleccionar->delete();

		return Redirect::back();
	}

	/**
	 * [validateForms description]
	 * @param  array  $inputs [description]
	 * @return [type]         [description]
	 */
	private function validateForms($inputs = array()){
		$rules = array(
			'titulo' => 'required|min:2',
			'fecha' => 'required',
			'departamento' => 'required',
			'requisitos' => 'required',
			'descripcion' => 'required',
			'area_interes' => 'required',	
			'archivo' => 'required'					
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