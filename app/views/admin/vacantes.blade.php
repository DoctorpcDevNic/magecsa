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
<style type="text/css">
	.hab{
		position: absolute;
		bottom: 0;
		color: black;
	}
</style>
	<div class="row">
		@foreach($vacantes as $value)
			<div class="col-sm-5 vacante">
				<h3 class="titul">{{ $value->titulo }}</h3>	
				<?php 
					$expresionregular = "/(^.{0,100})(\W+.*$)/"; 
          			$cadena = ($value->descripcion); 
          			$reemplazo = "\${1}";
				 ?>		
				<div>
					<p>{{ $value->departamento }}</p>
					<p> {{ $value->area_interes }} </p>
					<p>{{ preg_replace($expresionregular, $reemplazo, $cadena) }}...</p>
				</div>	
				<div>
					<a href="{{ URL::to('administrador/vacante/update/'. $value->id) }}" class="btn btn-primary">ver</a>
					@if($value->enable == 0)	
						<p class="hab">Vacante Deshabilitada</p>
					@else
						<p class="hab">Vacante Habilitada</p>	
					@endif	
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
	{{ Form::open(array('url' => 'administrador/vacante/save' , 'files' => true, 'class' => 'form-horizontal')) }}
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
		<div class="form-group">
			{{ Form::label('departamento', 'Departamento', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				<select class="form-control" name="departamento">
					<option value="Atlantico Norte (RAAN)">Atlantico Norte (RAAN)</option>				
					 <option value="Atlantico Sur (RAAS)">Atlantico Sur (RAAS)</option>	
					 <option value="Boaco">Boaco</option>				
					 <option value="Carazo">Carazo</option>				
					 <option value="Chinandega">Chinandega</option>				
					 <option value="Chontales">Chontales</option>				
					 <option value="Esteli">Esteli</option>				
					 <option value="Granada">Granada</option>				
					 <option value="Jinotega">Jinotega</option>				
					 <option value="Leon">Leon</option>							
					 <option value="Madriz">Madriz</option>							
					 <option value="Managua">Managua</option>							
					 <option value="Masaya">Masaya</option>							
					 <option value="Matagalpa">Matagalpa</option>							
					 <option value="Nueva Segovia">Nueva Segovia</option>							
					 <option value="Rio San Juan">Rio San Juan</option>							
					 <option value="Rivas">Rivas</option>		
				</select>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('requisitos', 'Requisitos', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				{{ Form::textarea('requisitos', Input::old('requisitos'), array('class' => 'form-control')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('descripcion', 'Descripcion', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				{{ Form::textarea('descripcion', Input::old('descripcion'), array('class' => 'form-control')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('area_interes', 'Area de Interes', array('class' => 'col-sm-3 control-label')) }}
			<div class="col-sm-6">
				<select class="form-control" name="area_interes">
					<option value="Mercadeo|Ventas">Mercadeo|Ventas</option>
					<option value="Banca|Servicios Financieros">Banca|Servicios Financieros</option>				
					<option value="Finanza|Contabilidad|Auditoria">Finanza|Contabilidad|Auditoria</option>	
					<option value="Produccion|Ingenieria|Calidad">Produccion|Ingenieria|Calidad</option>	
					<option value="Puestos Profesionales">Puestos Profesionales</option>	
					<option value="Administracion">Administracion</option>	
					<option value="Informatica|Internet">Informatica|Internet</option>	
					<option value="Telecomunicaciones">Telecomunicaciones</option>	
					<option value="Operaciones|Logistica">Operaciones|Logistica</option>	
					<option value="Almacenamiento">Almacenamiento</option>	
					<option value="Mantenimiento">Mantenimiento</option>	
					<option value="Publicidad|Comunicaciones">Publicidad|Comunicaciones</option>	
					<option value="Servicios">Servicios</option>	
					<option value="Call Center">Call Center</option>	
					<option value="Restaurantes">Restaurantes</option>	
					<option value="Recursos Humanos">Recursos Humanos</option>	
					<option value="Compras">Compras</option>
					<option value="Salud">Salud</option>
					<option value="Apoyo de Oficina">Apoyo de Oficina</option>		
				</select>
			</div>
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