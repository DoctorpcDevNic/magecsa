@extends('templates.maintemplate')
@section('titulo')
	Mas Empleos - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')	
<div class="masempleos">
	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif	
	<div class="row titulos">
		<h3 class="titul col-sm-6"><a href="{{ URL::to('MasEmpleos') }}"><i class="fa fa-users"></i>Vacantes Disponibles</a></h3>
		<h3 class="titul col-sm-6"><a href="{{ URL::to('Vacante/Search/all') }}"><i class="fa fa-search"></i>Búsqueda por áreas de Interés</a></h3>
	</div>
	<div class="vacantes">
		@foreach($vacantes as $value)
			<div class="vacante">
				<h3 class="titul">{{$value->titulo}}</h3>
				<?php $fecha = explode("-",$value->fecha); ?>
				<p class="fecha computer"><i class="fa fa-calendar"></i> {{ $fecha[2]."/" . $fecha[1] . "/" . $fecha[0] }} </p>
				<div class="descrip">
					<div class="row">
						<div class="col-sm-3">
							<img src="{{ asset('img/upload/'.$value->logo) }}" alt="" class="computer logo_vacante">
						</div>
						<div class="col-sm-6">
		                   <p><i class="fa fa-map-marker" style="padding:0 15px"></i>{{ $value->departamento }}</p>
		                   <p><i class="fa fa-graduation-cap" style="padding-right:10px"></i>{{ substr($value->requisitos, 0, 30); }}...</p>
		                  <p><i class="fa fa-list-ol" style="padding-right:10px"></i>{{ substr($value->descripcion, 0, 80); }}... <a href="{{ URL::to('Vacante/view/'. $value->id) }}">Leer Mas</a></p>
						</div>		
					</div>
				</div>
				<div class="aplicarvac">
					@if(Auth::check())
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
					@else
						<a href="{{  URL::to('login') }}"><i class="fa fa-check"></i>Aplicar a la vacante</a>						
					@endif
					
				</div>
				<div class="division"></div>
			</div>
		@endforeach
		{{ $vacantes->links() }}
	</div>
</div>
@stop