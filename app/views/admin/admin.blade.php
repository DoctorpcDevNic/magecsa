@extends('templates.admintemplate')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Empleados</h1>
    </div>               
</div>

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Email</td>
				<td>Username</td>								
				<td>Acciones</td>															
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $value)
				@if($value->role_id == 1)
					<tr>
						<td>{{$value->nombre}}</td>					
						<td>{{$value->email}}</td>					
						<td>{{ $value->username }}</td>	
						<td>
							<a href="{{ URL::to('administrador/usuarios/del/'. $value->id .'') }}" class="btn btn-small btn-danger">Borrar Usuario</a>
						</td>			
						
					</tr>
				@endif	
			@endforeach
		</tbody>
	</table>
</div>

<h1 class="page-header">Administradores</h1>

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Email</td>
				<td>Username</td>										
				<td>ROL</td>
				<td>Acciones</td>										
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $value)
				@if($value->role_id == 0)
					<tr>
						<td>{{$value->nombre}}</td>					
						<td>{{$value->email}}</td>					
						<td>{{ $value->username }}</td>	
						<td>Administrador</td>	
						<td>
							<a href="{{ URL::to('administrador/usuarios/del/'. $value->id .'') }}" class="btn btn-small btn-danger">Borrar Usuario</a>
						</td>
						
					</tr>
				@endif	
			@endforeach
		</tbody>
	</table>
</div>


<h1 class="page-header">Agregar Usuario</h1>

<div>
 		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

			{{ Form::open(array('url' => 'administrador/usuarios/register', 'files' => true, 'class' => 'form-horizontal')) }}

				<div class="form-group">
					{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder'=> 'Username')) }}	
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
						{{ Form::submit('Registrarse' , array('class'=> 'btn btn-primary')) }}
					</div>	
				</div>
				

			{{ Form::close() }}
</div>			


@stop