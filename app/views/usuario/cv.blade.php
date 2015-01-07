<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Curriculum {{ $user->usuariodato->nombres }}</title>	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/cv.css') }}">  
</head>
<body>
	
	<div class="cabe">
		<img src="{{ asset('img/logocv.png') }}" alt="" class="logo">
		<h2 class="slogan">¡Más Empleos , Mas Servicios!</h2>

		<div class="cuadroder">
			<div class="azul"></div>
			<div class="verde"></div>
			<div class="amarillo"></div>
		</div>
	</div>
	<div class="clear"></div>
	<h1 class="titul">CURRICULUM VITAE</h1>

	<div class="datos">
		<div class="avatar">
			<img src="{{ asset('img/upload/' . $user->usuariodato->foto) }}" alt="">
		</div>
		<div class="dato">
			<p>Nombres y Apellidos : <span class="res">{{ $user->usuariodato->nombres . " " . $user->usuariodato->apellidos }}</span></p> 
			<?php $fecha = explode("-",$user->usuariodato->fecha_nacimiento); ?>
			<p>Fecha de nacimiento : <span class="res">{{ $fecha[2]."/" . $fecha[1] . "/" . $fecha[0] }}</span></p> 
			<p>Nacionalidad : <span class="res">{{ $user->usuariodato->nacionalidad }}</span></p>
			<p>Estado civil : <span class="res">{{ $user->usuariodato->estado_civil }}</span></p>
			<p>Dirección : <span class="res">{{ $user->usuariodato->direccion }}</span></p>
			<p>Teléfonos : <span class="res">{{ $user->usuariodato->convencional . " / " . $user->usuariodato->celular }}</span></p>
			<p>E-mail : <span class="res">{{ $user->usuariodato->email }}</span></p>
		</div>
	</div>
	<div class="clear">
		<img src="{{ asset('img/linea1.png') }}" class="img-divider">
	</div>

	<div class="info">
		<div class="cuadros">
			<div class="cuadro der">
				<div class="cabe">
					<img src="{{ asset('img/formacioncv.png') }}" alt="">
					Formación académica
				</div>
				<div class="cuer">
					@foreach($user->usuarioeducacion()->get() as $value)
						<?php $fecha = explode("-",$value->fecha_finalizacion); ?>
						<p>{{ $fecha[0] }} {{ $value->titulo }} por {{ $value->instituto }}</p>
					@endforeach
				</div>
			</div>
			<div class="cuadro">
				<div class="cabe">
					<img src="{{ asset('img/otroscv.png') }}" alt="">
					Otros estudios
				</div>
				<div class="cuer">
					<p>{{$user->usuariootro->habilidad1 }} - {{ $user->usuariootro->nivel_dominio1 }}</p>
					<p>{{$user->usuariootro->habilidad2 }} - {{ $user->usuariootro->nivel_dominio2 }}</p>
					<p>{{$user->usuariootro->habilidad3 }} - {{ $user->usuariootro->nivel_dominio3 }}</p>
				</div>	
			</div>					
		</div>
			<div class="clear"></div>
			{{-- 2 --}}
		<div class="cuadros">
			<div class="cuadro der">
				<div class="cabe">
					<img src="{{ asset('img/experienciacv.png') }}" alt="">
					Experiencia profesional
				</div>
				<div class="cuer">
					@foreach($user->usuarioexperiencia()->get() as $value)
						<?php 
							$fecha_inicio = explode("-",$value->fecha_inicio);
							$fecha_fin = explode("-",$value->fecha_fin);
						?>
						<p>{{ $fecha_inicio[0] }} - {{ $fecha_fin[0] }} {{$value->funciones}} / {{ $value->nombre_empresa }}</p>
					@endforeach
				</div>
			</div>
			<div class="cuadro">
				<div class="cabe">
					<img src="{{ asset('img/idiomacv.png') }}" alt="">
					Idioma
				</div>
				<div class="cuer">
					<p>{{ $user->usuariootro->idioma}} {{ $user->usuariootro->nivel_dominio }}</p>
				</div>	
			</div>
		</div>
		<div class="clear"></div>
		{{-- 3 --}}
		<div class="cuadros">
			<div class="cuadro der">
				<div class="cabe">
					<img src="{{ asset('img/datoscv.png') }}" alt="">
					Otros datos de interés
				</div>
				<div class="cuer">
					<p>Vehículo: @if($user->usuariodato->vehiculo == 1) no @else si @endif</p>
					<p>Licencia: {{$user->usuariodato->categoria_licencia}} </p>
					<p>Expectativa Salarial: {{$user->usuarioexpectativa()->first()->expectativa_salarial}}  </p>
					<p>Disponibilidad: {{$user->usuarioexpectativa()->first()->interes_laboral}} </p>
				</div>
			</div>
			<div class="cuadro">
				<div class="cabe">
					<img src="{{ asset('img/competenciacv.png') }}" alt="">
					Competencias
				</div>
				<div class="cuer">
					<p>{{ $user->usuariodato->objetivo}} </p>
				</div>	
			</div>
		</div>
		<div class="clear"></div>
	</div>

	<img src="{{ asset('img/linea2.png') }}" class="img-divider">

	<div class="cuadroiz">
		<div class="azul"></div>
		<div class="verde"></div>
		<div class="amarillo"></div>
	</div>

	<div class="footer">
		<p class="direccion">Plaza Bolonia Modulo L5 / Telefono: 2266-5793 / info@magecsa.com.ni / www.masempleosyservicios.com.ni </p>
	</div>
</body>
</html>