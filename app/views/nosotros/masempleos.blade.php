@extends('templates.maintemplate')
@section('titulo')
	Mas Empleos - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')	
<div class="masempleos">
	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif	

	<h3 class="titul"><i class="fa fa-users"></i>Vacantes Disponibles</h3>

	<div class="vacantes">
		@foreach($vacantes as $value)
			<div class="vacante">
				<div class="triangulo"></div>
				<h3 class="titul">{{$value->titulo}}</h3>
				<?php $fecha = explode("-",$value->fecha); ?>
				<p class="fecha computer"><i class="fa fa-calendar"></i> {{ $fecha[2]."/" . $fecha[1] . "/" . $fecha[0] }} </p>
				<div class="descrip">
					{{ $value->cuerpo }}
				</div>
				<div class="aplicarvac">
					<?php 
						$vacanteusuario = VacanteUsuario::where('vacante_id', $value->id)->get();	
						$count = 0;					
					 ?>
					 @foreach($vacanteusuario as $key)
						@if($key->usuario_id == Auth::user()->id )
							<?php $count++; ?>
						@endif
					@endforeach
					@if($count == 0)
						<a href="{{  URL::to('perfil/vacante/aplicar/'. $value->id .'/' . Auth::user()->id) }}"><i class="fa fa-check"></i>Aplicar a la vacante</a>						
					@else
						<p>Ya aplico a esta vacante</p>						
					@endif
				</div>
				<div class="division"></div>
			</div>
		@endforeach
		{{ $vacantes->links() }}
	</div>
</div>
@stop