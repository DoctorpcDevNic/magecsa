<?php

class SliderController extends BaseController {

	/**
	 * [viewEmpresas description]
	 * @return [type] [description]
	 */
	public function view(){
		$slider = Slider::all();
		return View::make('admin.slider')->with('slider', $slider);
	}

	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){
		$rules = array(
			'descripcion' => 'required',
			'archivo' => 'required'
			);
		$message = array(
			'required' => 'El campo :attribute es requerido'			
			);

		$validate = Validator::make(Input::all(), $rules, $message);

		if($validate->fails()){
			return Redirect::back()->withErrors($validate)->withInput();
		}else{

			$slider = new Slider();
			$count = Slider::all();

			if(Input::hasFile('archivo')) {
		       	Input::file('archivo')->move('img/upload/slider/', $count->count() .Input::file("archivo")->getClientOriginalName());
		       	$file = $count->count() .Input::file("archivo")->getClientOriginalName();
	     	}

	     	$slider->imagen = $file;
	     	$slider->descripcion = Input::get('descripcion');


	     	$slider->save();

	     	Session::flash('message', 'Imagen Agregada');
			return Redirect::back();
	    }
	}

	/**
	 * [viewupdate description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function viewupdate($id){
		$slider = Slider::find($id);
		return View::make('admin.sliderview')->with('slider', $slider);
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update($id){
		$rules = array(
			'descripcion' => 'required',			
			);
		$message = array(
			'required' => 'El campo :attribute es requerido'			
			);

		$validate = Validator::make(Input::all(), $rules, $message);

		if($validate->fails()){
			return Redirect::back()->withErrors($validate)->withInput();
		}else{

			$slider = Slider::find($id);
			$file = $slider->imagen;

			if(Input::hasFile('archivo')) {
		       	Input::file('archivo')->move('img/upload/slider/', $slider->id .Input::file("archivo")->getClientOriginalName());
		       	$file = $slider->id .Input::file("archivo")->getClientOriginalName();
	     	}

	     	$slider->imagen = $file;
	     	$slider->descripcion = Input::get('descripcion');


	     	$slider->save();

	     	Session::flash('message', 'Imagen Modificada');
			return Redirect::back();
	    }
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete($id){
		$slider = Slider::find($id);

		File::delete('img/upload/slider/'.$slider->imagen);
		
		$slider->delete();

		Session::flash('mensaje','Imagen eliminada');
		return Redirect::back();
	}
}
?>