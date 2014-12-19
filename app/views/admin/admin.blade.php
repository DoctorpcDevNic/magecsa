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

<div class="">
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Email</td>
				<td>Username</td>
				<td>Cargo</td>										
				<td>ROL</td>
				<td>Acciones</td>										
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $value)
				@if($value->role_id == 0)
					<tr>
						<td>{{ $value->usuarioadmin->nombres }}</td>					
						<td>{{ $value->usuarioadmin->email }}</td>					
						<td>{{ $value->username }}</td>	
						<td>{{ $value->usuarioadmin->cargo }}</td>
						<td>Administrador</td>	
						<td>							
							<div class="btn-group">
								<button type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ URL::to('administrador/usuariosadmin/update/'. $value->id) }}">Ver Usuario</a></li>
									<li><a href="{{ URL::to('administrador/usuariosadmin/update/'. $value->id) }}">Modificar Usuario</a></li>
									<li class="divider"></li>
									<li><a href="{{ URL::to('administrador/usuariosadmin/delete/'. $value->id) }}">Borrar Usuario</a></li>
								</ul>
							</div>
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

			{{ Form::open(array('url' => 'administrador/usuariosadmin/save', 'class' => 'form-horizontal')) }}

				<div class="form-group">
					{{ Form::label('nombres', 'Nombres', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('nombres', Input::old('nombres'), array('class' => 'form-control', 'placeholder'=> 'Nombres')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('apellidos', 'Apellidos', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('apellidos', Input::old('apellidos'), array('class' => 'form-control', 'placeholder'=> 'Apellidos')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('cargo', 'Cargo', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('cargo', Input::old('cargo'), array('class' => 'form-control', 'placeholder'=> 'Cargo')) }}	
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
						{{ Form::submit('Guardar' , array('class'=> 'btn btn-primary')) }}
					</div>	
				</div>
			{{ Form::close() }}
</div>			


@stop