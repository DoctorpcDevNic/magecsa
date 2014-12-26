@extends('templates.maintemplate')
@section('contenido')
	<div class="login">
		<h3 class="titul">
			<i class="glyphicon glyphicon-user computer"></i>Inicar Sesion
		</h3>
		@if(Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}    

		{{ Form::open(array('url' => 'perfil/login', 'class' => 'form col-md-6 col-sm-offset-3')) }}
			<div class="form-group">
				{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder'=> 'Username')) }} 
			</div> 
			<div class="form-group">
				{{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'Password')) }}  
			</div>
			<div class="form-group dow">
				<button class="btn btn-primary btn-lg btn-block">Iniciar Sesion</button>
				<span><a href="http://doctorpc.com.ni/" target="new">Olvide mi contraseña</a></span><br>
				<span><a href="http://doctorpc.com.ni/" target="new">Registro de usuario</a></span>
			</div>
		{{ Form::close() }}  
	</div>

@stop