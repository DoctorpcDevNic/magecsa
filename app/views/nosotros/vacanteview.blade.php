@extends('templates.maintemplate')
@section('titulo')
	Vacante {{ $vacante->titulo }} - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')
<div class="masempleos vervacante">
	<h3 class="titul" style="text-align:left; font-size:1.2em"><a href="{{ URL::to('MasEmpleos') }}" style="color:#337ab7">Seguir Viendo mas vacantes</a></h3>
	<h3 class="titul">{{ $vacante->titulo }}</h3>
	<?php $fecha = explode("-",$vacante->fecha); ?>
	<p class="fecha computer"><i class="fa fa-calendar"></i> {{ $fecha[2]."/" . $fecha[1] . "/" . $fecha[0] }} </p>
	<div class="row">
		<div class="col-md-4 col-xs-12 logo_vacante">
			<img src="{{ asset('img/upload/'. $vacante->logo) }}" alt="">
		</div>
		<div class="col-md-6 col-xs-12 descrip_vacante">
			<p class="ic"><i class="fa fa-map-marker"></i> Ubicación</p>
			<p>{{ $vacante->departamento }}</p>

            <p class="ic"><i class="fa fa-graduation-cap"></i> Requisitos</p>
            <p>{{ $vacante->requisitos }}</p>

           	<p class="ic"><i class="fa fa-list-ol"></i> Descripcion</p>
           	<p>{{ $vacante->descripcion }} </p>
		</div>
	</div>
	<div class="aplicarvac">
		@if(Auth::check())
			<?php 
				$vacanteusuario = VacanteUsuario::where('vacante_id', $vacante->id)->get();	
				$count = 0;					
			 ?>
			 @foreach($vacanteusuario as $key)
				@if($key->usuario_id == Auth::user()->id )
					<?php $count++; ?>
				@endif
			@endforeach
			@if($count == 0)
				<a href="{{  URL::to('perfil/vacante/aplicar/'. $vacante->id .'/' . Auth::user()->id) }}"><i class="fa fa-check"></i>Aplicar a la vacante</a>						
			@else
				<p>Ya aplico a esta vacante</p>						
			@endif
		@else
			<a href="{{  URL::to('login') }}"><i class="fa fa-check"></i>Aplicar a la vacante</a>						
		@endif
		
	</div>
</div>
@stop