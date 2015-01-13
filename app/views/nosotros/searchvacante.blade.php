@extends('templates.maintemplate')
@section('titulo')
	Busqueda Vacantes - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')	
<div class="masempleos">
	<h3 class="titul"><i class="fa fa-users"></i>Vacantes Disponibles</h3>
	
	{{ Form::open(array('url' => 'Vacante/Search/find', 'class' => 'form-horizontal')) }}
		<div class="form-group">
            {{ Form::label('titulo', 'Area de Interes', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-6">
                <select class="form-control" name="area_interes">
                	<option value="all">Todas</option>
                    <option value="Mercadeo|Ventas">Mercadeo|Ventas</option>
                    <option value="Banca|Servicios Financieros">Banca|Servicios Financieros</option>                
                    <option value="Finanza|Contabilidad|Auditoria">Finanza|Contabilidad|Auditoria</option>  
                    <option value="Produccion|Ingenieria|Calidad">Produccion|Ingenieria|Calidad</option>    
                    <option value="Puestos Profesionales">Puestos Profesionales</option>    
                    <option value="Administracion">Administracion</option>  
                    <option value="Informatica|Internet">Informatica|Internet</option>  
                    <option value="Telecomunicaciones">Telecomunicaciones</option>  
                    <option value="Operaciones|Logistica">Operaciones|Logistica</option>    
                    <option value="Almacenamiento">Almacenamiento</option>  
                    <option value="Mantenimiento">Mantenimiento</option>    
                    <option value="Publicidad|Comunicaciones">Publicidad|Comunicaciones</option>    
                    <option value="Servicios">Servicios</option>    
                    <option value="Call Center">Call Center</option>    
                    <option value="Restaurantes">Restaurantes</option>  
                    <option value="Recursos Humanos">Recursos Humanos</option>  
                    <option value="Compras">Compras</option>
                    <option value="Salud">Salud</option>
                    <option value="Apoyo de Oficina">Apoyo de Oficina</option>      
                </select>
            </div>
            <div class="col-sm-3">
            	{{ Form::submit('Buscar Vacante' , array('class'=> 'btn btn-primary')) }}				
            </div>
        </div>
		
	{{ Form::close() }}

	@if($vacantes->count() == 0)
		<h3 class="titul" style="text-align:left; font-size:1.2em"><a href="{{ URL::to('MasEmpleos') }}" style="color:#337ab7">Seguir Viendo mas vacantes</a></h3>
		<h3 class="titul">No existen vacantes</h3>
	@else
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
			                   <p><i class="fa fa-map-marker"></i>{{ $value->departamento }}</p>
			                   <p><i class="fa fa-info-circle"></i>{{ substr($value->requisitos, 0, 30); }}...</p>
			                   <p><i class="fa fa-info"></i> {{ substr($value->descripcion, 0, 80); }}... <a href="{{ URL::to('Vacante/view/'. $value->id) }}">Leer Mas</a></p>
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
		</div>
	@endif	
</div>


@stop