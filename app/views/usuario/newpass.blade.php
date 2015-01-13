@extends('templates.maintemplate')
@section('contenido')
<div class="remember">
	<h3 class="titul">
		<i class="fa fa-unlock-alt computer"></i>Ingrese la nueva contraseña
	</h3>
	@if(Session::has('message'))
		<div class="alert alert-info col-md-8 col-sm-offset-2">{{ Session::get('message') }}</div>
	@endif

	{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}    

	{{ Form::open(array('url' => 'login/nueva/password', 'class' => 'form-horizontal col-md-6 col-sm-offset-3')) }}
		<div class="form-group">
			<input type="hidden" value="{{ $user->id }}" name="id_usuario">
			{{ Form::password('password' , array('class' => 'form-control', 'placeholder'=> 'Contraseña')) }}	
		</div>
		<div class="form-group">
			{{ Form::password('password_confirmation' , array('class' => 'form-control', 'placeholder'=> 'Confirmar Contraseña')) }}	
		</div>
		<div class="form-group dow">
			<button class="btn btn-primary btn-lg btn-block">Enviar</button>			
			<span><a href="http://doctorpc.com.ni/" target="new">Registro de usuario</a></span>
		</div>
	{{ Form::close() }}  
</div>
@stop