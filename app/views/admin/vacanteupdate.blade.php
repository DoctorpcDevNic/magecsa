@extends('templates.admintemplate')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ $vacante->titulo }}</h1>
    </div>               
</div>

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="addvacantes">
{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
	{{ Form::open(array('url' => 'administrador/vacante/update/' .$vacante->id , 'files' => true, 'class' => 'form-horizontal col-sm-offset-2')) }}
		<div class="form-group">
			{{ Form::label('titulo', 'Titulo de la vacante', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('titulo', Input::old('titulo') ? Input::old(): $vacante->titulo,  array('class' => 'form-control', 'placeholder'=> 'Titulo de la vacante')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('fecha', 'Fecha', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				{{ Form::input('date', 'fecha', Input::old('fecha') ? Input::old(): $vacante->fecha, array('class' => 'form-control')) }}	
			</div>
		</div>
		<div class="form-group" style="width: 90%">
			{{ Form::textarea('cuerpo', Input::old('cuerpo')? Input::old(): $vacante->cuerpo, array('class' => 'form-control', 'placeholder'=> 'Titulo de la vacante', 'id' => 'summernote')) }}	
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

