@extends('templates.admintemplate')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ $user->usuarioadmin->nombres }}</h1>
    </div>               
</div>

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div>
 		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

			{{ Form::open(array('url' => 'administrador/usuariosadmin/update/'.$user->id, 'class' => 'form-horizontal')) }}

				<div class="form-group">
					{{ Form::label('nombres', 'Nombres', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('nombres', Input::old('nombres') ? Input::old(): $user->usuarioadmin->nombres, array('class' => 'form-control', 'placeholder'=> 'Nombres')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('apellidos', 'Apellidos', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('apellidos', Input::old('apellidos') ? Input::old(): $user->usuarioadmin->apellidos , array('class' => 'form-control', 'placeholder'=> 'Apellidos')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('email', Input::old('email') ? Input::old(): $user->usuarioadmin->email, array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('cargo', 'Cargo', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('cargo', Input::old('cargo') ? Input::old(): $user->usuarioadmin->cargo, array('class' => 'form-control', 'placeholder'=> 'Cargo')) }}	
					</div>
				</div>	
				<div class="form-group">
					{{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('username', Input::old('username') ? Input::old(): $user->username, array('class' => 'form-control', 'placeholder'=> 'Username')) }}	
					</div>
				</div>			
				<div class="form-group">
					{{ Form::label('password', 'Contraseña', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'password')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('password_confirmation', 'Confirmar Contraseña', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=> 'confirmar password')) }}	
					</div>
				</div>	
				<div class="form-group">
					{{ Form::label('rol', 'Rol', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-6">
						<select class="form-control" name="rol">
							<option value='0'> Administrador </option>
							<option value='1'> Empleado </option>							
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{{ Form::submit('Modificar' , array('class'=> 'btn btn-primary')) }}
					</div>	
				</div>
			{{ Form::close() }}
</div>	


@stop