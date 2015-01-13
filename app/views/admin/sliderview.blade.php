@extends('templates.admintemplate')
@section('contenido')
	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Slider</h1>
	    </div>               
	</div>

	{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
	{{ Form::open(array('url' => 'administrador/slider/update/' . $slider->id , 'files' => true, 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('descripcion', 'Descripcion de la imagen', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				{{ Form::textarea('descripcion', Input::old('descripcion') ? Inpu::old(): $slider->descripcion, array('class' => 'form-control', 'placeholder'=> 'Titulo de la vacante')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('logo', 'Imagen', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				{{ Form::file('archivo') }}
			</div>
		</div>
		<div class="form-group" style="margin-top: 2em">								
			{{ Form::submit('Modificar Imagen' , array('class'=> 'btn btn-primary regis', 'style' => 'padding:20px; font-size: 18px ')) }}				
		</div>
	{{ Form::close() }}		
@stop