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
			{{ Form::submit('Modificar Vacante' , array('class'=> 'btn btn-primary regis', 'style' => 'padding:20px; font-size: 18px ')) }}				
		</div>
	{{ Form::close() }}
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Candidatos</h1>
    </div>               
</div>
<div>
	<?php 
		$vacantes = VacanteUsuario::where('vacante_id', $vacante->id)->get();

	 ?>
	<table class="table table-hover table-striped table-bordered" id="candidatos">
		 <thead>
            <tr>
                <th>Nombre</th>
                <th>Area de interes</th>
               	<th>Genero</th>
               	<th>Vehiculo</th>
               	<th>Nivel Academico</th>
               	<th>Habilidad</th>
               	<th>Idioma</th>
            </tr>
            <tbody>
            	@foreach($vacantes as $value)
                    <?php 
                        $user = User::where('id', $value->usuario_id)->first();
                     ?>
            		<tr>
            			<td><a href="{{ URL::to('Perfil/'. $user->username )}}" target="new">{{ $user->usuariodato->nombres }}</a> </td>

            			<td>
            				@foreach($user->usuarioexperiencia()->get() as $key)
            					{{ $key->area }},  
            				@endforeach
            			</td>
            			<td>{{ $user->usuariodato->genero }} </td>
            			<td>
            				@if($user->usuariodato->vehiculo == 1) no
            				@else si
            				@endif
            			</td>
            			<td>
							@foreach($user->usuarioeducacion()->get() as $key)
            					{{ $key->nivel_academico }},  
            				@endforeach
            			</td>
            			<td>
            				{{ $user->usuariootro->habilidad1 }} ,
            				{{ $user->usuariootro->habilidad2 }} ,
            				{{ $user->usuariootro->habilidad3 }} 
            			</td>
            			<td>{{ $user->usuariootro->idioma }} </td>
            		</tr>
            	@endforeach	
            </tbody>
        </thead>
	</table>
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
<script type="text/javascript">	
    $('#candidatos').dataTable({
    	"language": {
            "url": "http://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Spanish.json"
        }
    });	
</script>
@stop

