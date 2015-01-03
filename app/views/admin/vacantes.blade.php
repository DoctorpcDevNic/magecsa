@extends('templates.admintemplate')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Vacantes</h1>
    </div>               
</div>

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="vacantes">
	<div class="row">
		@foreach($vacantes as $value)
			<div class="col-sm-5 vacante">
				<h3 class="titul">{{ $value->titulo }}</h3>	
				<?php 
					$expresionregular = "/(^.{0,100})(\W+.*$)/"; 
          			$cadena = ($value->cuerpo); 
          			$reemplazo = "\${1}";
				 ?>		
				<div>
					<p>{{ preg_replace($expresionregular, $reemplazo, $cadena) }}...</p>
				</div>	
				<div>
					<a href="{{ URL::to('administrador/vacante/update/'. $value->id) }}" class="btn btn-primary">ver</a>
				</div>	
			</div>
		@endforeach
	</div>
</div>

<div class="divider"></div>

<div class="addvacantes">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Agregar Vacantes</h1>
    </div>               
</div>
{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
	{{ Form::open(array('url' => 'administrador/vacante/save' , 'files' => true, 'class' => 'form-horizontal col-sm-offset-2')) }}
		<div class="form-group">
			{{ Form::label('titulo', 'Titulo de la vacante', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('titulo', Input::old('titulo'), array('class' => 'form-control', 'placeholder'=> 'Titulo de la vacante')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('fecha', 'Fecha', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				{{ Form::input('date', 'fecha', Input::old('fecha'), array('class' => 'form-control')) }}	
			</div>
		</div>
		<div class="form-group" style="width: 90%">
			{{ Form::textarea('cuerpo', Input::old('cuerpo'), array('class' => 'form-control', 'placeholder'=> 'Titulo de la vacante', 'id' => 'summernote')) }}	
		</div>	
		<div class="form-group">
			{{ Form::label('logo', 'Logo', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				{{ Form::file('archivo') }}
			</div>
		</div>
		<div class="form-group" style="margin-top: 2em">								
			{{ Form::submit('Agregar Vacante' , array('class'=> 'btn btn-primary regis', 'style' => 'padding:20px; font-size: 18px ')) }}				
		</div>
	{{ Form::close() }}
</div>

@stop
@section('js')
<script type="text/javascript">
	 $('#summernote').summernote({
	 	 height: 300,
	 	 lang: 'es-ES',
	 	  toolbar: [
		    //[groupname, [button list]]
		     
		    ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
		    ['font', ['strikethrough']],
		    ['fontsize', ['fontsize']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']],
		  ]
	 });
</script>
@stop
