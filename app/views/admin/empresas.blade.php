@extends('templates.admintemplate')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Empresas</h1>
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
				<td>Actividad</td>
				<td>Pagina</td>								
				<td>Telefono</td>
				<td>Email</td>	
				<td>Puestos que aplica</td>															
				<td>Acciones</td>				
			</tr>
		</thead>
		<tbody>
			@foreach($empresas as $value)
				<?php $user = User::where('id', $value->usuario_id)->first(); ?>
				@if($user->enable == 1)
					<tr>
						<td>{{ $value->nombre }}</td>					
						<td>{{ $value->actividad }}</td>					
						<td>{{ $value->pagina }}</td>	
						<td>{{ $value->telefono }}</td>	
						<td>{{ $user->email }}</td>
						<td>{{ $value->puestos }}</td>	
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">									
									<li><a href="{{ URL::to('administrador/empresas/update/'. $value->id) }}">Modificar Empresa</a></li>
									<li class="divider"></li>
									<li><a href="{{ URL::to('administrador/empresas/activo/'. $value->id) }}">@if($user->enable == 0) Habilitar Empresa @else Deshabilitar Empresa @endif</a></li>
									<li><a href="{{ URL::to('administrador/empresas/delete/'. $value->id) }}">Borrar Empresa</a></li>
								</ul>
							</div>
						</td>
					</tr>
				@endif	
			@endforeach
		</tbody>
	</table>
</div>
@stop