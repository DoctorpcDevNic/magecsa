@extends('templates.admintemplate')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Mensajes llegado de Contacto</h1>
    </div>               
</div>

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


<div>
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Razon Social</td>
				<td>Email</td>								
				<td>Telefono</td>
				<td>Mensaje</td>	
				<td>Leido</td>															
				<td>Acciones</td>				
			</tr>
		</thead>
		<tbody>
			@foreach($mensajes as $value)
				<tr>
					<td>{{ $value->nombre }}</td>
					<td>{{ $value->razon }}</td>
					<td>{{ $value->email }}</td>
					<td>{{ $value->telefono }}</td>
					<td>{{ $value->nombre }}</td>
					<td>
						@if($value->leido == 0)
						No
						@else
						Si
						@endif
					</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								Acciones <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">									
								<li><a href="{{ URL::to('administrador/mensajes/view/'. $value->id) }}">Ver</a></li>
								<li class="divider"></li>
								<li><a href="{{ URL::to('administrador/mensajes/delete/'. $value->id) }}">Borrar Mensaje</a></li>
							</ul>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	
</div>

@stop