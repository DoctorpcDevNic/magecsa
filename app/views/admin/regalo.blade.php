@extends('templates.maintemplate')
@section('titulo')
	Perfil {{ $user->username }} - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')
@if(Session::has('message'))
	<div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif
<div class="perfil">
<div class="perfilpublico">
		<div class="triangulo"></div>
		<div class="row">
			<div class="col-xs-2 avatarpf">
				<img src="{{ asset('img/upload/' . $user->usuariodato->foto) }}" alt="">
			</div>
			<div class="col-xs-10">
				<p class="nombre">{{ $user->usuariodato->nombres ." ". $user->usuariodato->apellidos  }}</p>
				<p class="objetivo">{{ $user->usuariodato->objetivo }}</p>
			</div>
		</div>	
		<div class="infopf">			
			<div class="row">
				<div class="col-xs-3 info" id="fa">
					<div class="cabe">
						<img src="{{ asset('img/educacion.png') }}" alt="">
						<p class="computer">FORMACION ACADEMICA</p>
					</div>
					<div class="exbd">
						@foreach($user->usuarioeducacion()->orderBy('id', 'desc')->get() as $value)
							<p>{{$value->titulo}}</p>
						@endforeach
					</div>	
					<span></span>
				</div>
				<div class="col-xs-3 info" id="ht">
					<div class="cabe">
						<img src="{{ asset('img/otros.png') }}" alt="">
						<p class="computer">HABILIDADES TECNICAS</p>
					</div>
					<div class="exbd">
						<p>Idioma: {{ $user->usuariootro->idioma }} / {{ $user->usuariootro->nivel_dominio }}</p>
						<p>Habilidades:</p>
						@if($user->usuariootro->habilidad1 == '')
						@else
							<p><li style="color: #fbef44">{{ $user->usuariootro->habilidad1 }}</li></p>
						@endif

						@if($user->usuariootro->habilidad2 == '')
						@else
							<p><li style="color: #fbef44">{{ $user->usuariootro->habilidad2 }}</li></p>
						@endif

						@if($user->usuariootro->habilidad3 == '')
						@else
							<p><li style="color: #fbef44">{{ $user->usuariootro->habilidad3 }}</li></p>
						@endif
					</div>	
					<span></span>
				</div>
				<div class="col-xs-3 info" id="di">
					<div class="cabe">
						<img src="{{ asset('img/datospersonales.png') }}" alt="">
						<p class="computer">OTROS DATOS DE INTERES</p>
					</div>
					<div class="exbd">
						<p> Licencia : {{ $user->usuariodato->categoria_licencia }} </p>
						<p>Vehículo: @if($user->usuariodato->vehiculo == 1) no @else si @endif</p>
						<?php 
							$fecha = UsuarioDato::where('usuario_id', $user->id)->first(); 
							list($Y,$m,$d) = explode("-",$fecha->fecha_nacimiento);
							$fecha = date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y ;
						 ?>	
						 <p>{{ $user->usuariodato->departamento }}, {{ $user->usuariodato->nacionalidad }}</p>
						<p>{{ $fecha }} años</p>	
						<p>Expectativa Salarial Mensual: {{ $user->usuarioexpectativa()->first()->expectativa_salarial }}</p>					
						
					</div>
					<span></span>
				</div>
				<div class="col-xs-3 info" id="ep">
					<div class="cabe">
						<img src="{{ asset('img/experiencia.png') }}" alt="">
						<p class="computer">EXPERIENCIA PROFESIONAL</p>
					</div>
					<div class="exbd">
						@foreach($user->usuarioexperiencia()->orderBy('id', 'desc')->get() as $value )
							<p>{{ $value->nombre_empresa }} - {{ $value->puesto }}</p>
						@endforeach
					</div>	
				</div>
			</div>				
		</div>
		<div class="pie">
			@if(Auth::check())
				@if(Auth::user()->id == $user->id || Auth::user()->role_id == 0)
					<div>				
						<a href="{{ URL::to('perfil/cv/'. $user->username) }}" target="new">
							<img src="{{ asset('img/cvdescarga.png') }}" alt="">
							DESCARGAR CURRICULUM
						</a>				
					</div>
					<div>
						{{ Form::open(array('url' => 'administrador/save/regalo', 'class' => 'form-inline')) }}   
							<label style="color:white; font-weight:initial">SELECCIONAR LA VACANTE</label>
							<select name="vacante" class="form-control">
							<?php $vacantes = Vacante::where('enable', 1)->get() ?>
								@foreach($vacantes as $value)
									<option value="{{ $value->id }}" >{{$value->titulo}}</option>
								@endforeach
							</select>
							<input type="hidden" value="{{ $user->id }}" name="usuario">

							<input type="submit" value="Agregar" class="btn btn-info" style="color:white">
						{{ Form::close() }}          							
					</div>
					<div>
						@if($user->enable == 0)
							<a href="{{ URL::to('perfil/habilitar/'. $user->id) }}" target="new" style="margin-left:20px">
								<i class="fa fa-times"style="font-size: 2em; padding:0 8px"></i>
								HABILITAR USUARIO
							</a>
						@else
							<a href="{{ URL::to('perfil/habilitar/'. $user->id) }}" target="new" style="margin-left:20px">
								<i class="fa fa-times"style="font-size: 2em; padding:0 8px"></i>
								DESHABILITAR USUARIO
							</a>
						@endif
					</div>
				@endif
			@endif
		</div>
		<div class="clear"></div>
	</div>
</div>
@stop

