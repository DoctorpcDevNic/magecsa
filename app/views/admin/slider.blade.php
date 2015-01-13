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
<div class="row">
	@foreach($slider as $value)
		<div class="col-md-4" style="padding-top:15px; padding-bottom:15px">
			<a href="{{ URL::to('administrador/slider/view/'. $value->id) }}">
				<img src="{{ asset('img/upload/slider/' . $value->imagen) }}" alt="" class="img-responsive">
				<p>{{ substr($value->descripcion, 0, 50) }} ...</p>
			</a>
			<a href="{{ URL::to('administrador/slider/delete/'.$value->id) }}" class="btn btn-danger">Eliminar</a>	
		</div>
	@endforeach	
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Agregar Imagen</h1>
    </div>               
</div>
<div class="alert alert-danger" role="alert">Se recomienda que el tamaño de las imagenes no sobrepase 300kb con una resolucion de 2000px de ancho x 1000px de altura </div>
{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
	{{ Form::open(array('url' => 'administrador/slider/save' , 'files' => true, 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('descripcion', 'Descripcion de la imagen', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				{{ Form::textarea('descripcion', Input::old('descripcion'), array('class' => 'form-control', 'placeholder'=> 'Descripcion de la imagen')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('logo', 'Imagen', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				{{ Form::file('archivo') }}
			</div>
		</div>
		<div class="form-group" style="margin-top: 2em">								
			{{ Form::submit('Agregar Imagen' , array('class'=> 'btn btn-primary regis', 'style' => 'padding:20px; font-size: 18px ')) }}				
		</div>
	{{ Form::close() }}		
@stop