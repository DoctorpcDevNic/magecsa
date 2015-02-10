@extends('templates.maintemplate')
@section('titulo')
	Login - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')
	<div class="login">
		<h3 class="titul">
			<i class="glyphicon glyphicon-user computer"></i>Inicar Sesión
		</h3>
		@if(Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}    

		{{ Form::open(array('url' => 'perfil/login', 'class' => 'form col-md-6 col-sm-offset-3')) }}
			<div class="form-group">
				{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder'=> 'Usuario')) }} 
			</div> 
			<div class="form-group">
				{{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'Contraseña')) }}  
			</div>
			<div class="form-group dow">
				<button class="btn btn-primary btn-lg btn-block">Iniciar Sesión</button>
				<span><a href="{{ URL::to('recuperar/password') }}" target="new">Olvide mi contraseña</a></span><br>
				<span><a href="{{ URL::to('Registrar') }}">Registro de usuario</a></span>
			</div>
		{{ Form::close() }}  
	</div>

@stop