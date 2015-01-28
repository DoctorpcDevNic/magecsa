@extends('templates.maintemplate')
@section('titulo')
	Mas Servicios - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')
<div class="masservicios">
	<div role="tabpanel">
	  <!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist" id="tabservicios">
		    <li role="presentation" class="active"><a href="#registroempresa" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-pencil-square-o"></i>Registre su Empresa</a></li>
		    <li role="presentation"><a href="#busquedacandidato" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-search"></i>Búsqueda por Candidato</a></li>
		    <li role="presentation"><a href="#vacante" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-bullhorn"></i>Publicar Vacantes</a></li>	   
		</ul>

	  	<!-- Tab panes -->
		<div class="tab-content">
		  	@if(Auth::check())
		  		@if(Auth::user()->role_id == 2)	  
		  			<div role="tabpanel" class="tab-pane active" id="registroempresa">
		  				<h2 class="titul" style="color:#45aabb;text-align:center">Su Empresa ya esta registrada</h2>
		  			</div>
		  			<div role="tabpanel" class="tab-pane" id="busquedacandidato">
				    	<h2 class="titul">Búsqueda de Candidatos registrados</h2>
				    	<p>Bienvenido a la base de datos mas amplia, fácil y eficiente con potencial 100 %  nicaragüense, a continuación podrá hacer un  filtro según sus necesidades de búsqueda para obtener a su candidato deseado, de igual manera le recordamos nuestros servicios directos de Reclutamiento, Selección y Evaluación de Personal, gracias por unirte a esta  gran familia.</p>				    	

				    	<h2 class="titul" style="font-size:1.5em">Filtro de vacantes</h2>

				    	<?php 
				    		$empresa = User::find(Auth::user()->id); 
				    		$puestos = $empresa->puestos;
				    		$experiencias = UsuarioExperiencia::where('area', 'LIKE', $puestos)->get();
				    	?>

				    	<div>
							<table class="table table-hover table-striped table-bordered" id="candidatos">
								 <thead>
						            <tr>
						                <th>Nombre</th>
						                <th>Area de interes</th>
						               	<th>Genero</th>
						               	<th>Vehiculo</th>
						                <th>Edad</th>
						               	<th>Nivel Academico</th>
						               	<th>Habilidad</th>
						               	<th>Idioma</th>
						            </tr>
						            <tbody>
						            @foreach($experiencias as $value )
						            	<?php $user = User::where('id', $value->usuario_id)->first(); ?>
						            	<tr>
						            		<td><a href="{{ URL::to('Perfil/'. $user->username )}}" target="new">{{ $user->usuariodato->nombres }}</a> </td>
						            		<td>
					            				@foreach($user->usuarioexperiencia()->get() as $key)
					            					{{ $key->area }},  
					            				@endforeach
					            			</td>
					            			<td>{{ $user->usuariodato->genero }} </td>
					            			<td>
					            				@if($user->usuariodato->vehiculo == 1) no
					            				@else si
					            				@endif
					            			</td>
					                         <td>
					                            <?php 
					                                $fecha = UsuarioDato::where('usuario_id', $user->id)->first(); 
					                                list($Y,$m,$d) = explode("-",$fecha->fecha_nacimiento);
					                                $fecha = date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y ;
					                             ?>
					                             {{ $fecha }}
					                        </td>
					            			<td>
												@foreach($user->usuarioeducacion()->get() as $key)
					            					{{ $key->nivel_academico }},  
					            				@endforeach
					            			</td>
					            			<td>
					            				{{ $user->usuariootro->habilidad1 }} ,
					            				{{ $user->usuariootro->habilidad2 }} ,
					            				{{ $user->usuariootro->habilidad3 }} 
					            			</td>
					            			<td>{{ $user->usuariootro->idioma }} </td>
						            	</tr>
						            @endforeach
						            </tbody>
						        </thead>
							</table>
						</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="vacante">
				    	<h2 class="titul">Comuníquese con el Administrador de la página <a href="{{ URL::to('Contactenos') }}" style="color:  #61a75b; text-decoration:underline">Contáctenos</a></h2>
				    </div>		
		  		@else
		  			<div role="tabpanel" class="tab-pane active" id="registroempresa">
				    	<div class="datos">
				    		@if(Session::has('message'))
								<div class="alert alert-info">{{ Session::get('message') }}</div>
							@endif

							{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

							{{ Form::open(array('url' => 'save/empresas' , 'files' => true, 'class' => 'form-horizontal col-sm-offset-2')) }}
								<div class="form-group">
									{{ Form::label('nombre', 'Nombre de la Empresa', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-6">
										{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre de la Empresa')) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('actividad', 'Actividad de la Empresa', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-6">
										<select class="form-control area" name="actividad" >
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
								</div>
								<div class="form-group">
									{{ Form::label('pagina', 'Página Web', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-6">
										{{ Form::text('pagina', Input::old('pagina'), array('class' => 'form-control', 'placeholder'=> 'Página Web')) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('telefono', 'Teléfono', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-6">
										{{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control convencional', 'placeholder'=> 'Teléfono')) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-6">
										{{ Form::input('email', 'email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('logo', 'Logo de la Empresa', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-6">
										{{ Form::file('archivo') }}
									</div>
								</div>
								<div class="form-group franja">
									{{ Form::label('username', 'Username', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-7">
										{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder'=> 'Username')) }}	
									</div>
								</div>
								<div class="form-group franja col-sm-offset-4">
									{{ Form::label('password', 'Contraseña', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-7">
										{{ Form::password('password',  array('class' => 'form-control', 'placeholder'=> 'Contraseña')) }}	
									</div>
								</div>
								<div class="form-group" style="margin-top: 2em">								
									{{ Form::submit('Enviar solicitud' , array('class'=> 'btn btn-primary regis', 'style' => 'padding:20px; font-size: 18px ')) }}				
								</div>
							{{ Form::close() }}
						</div>	
		   			</div>
		   			<div role="tabpanel" class="tab-pane" id="busquedacandidato">
				    	<h2 class="titul">Busqueda de cantidatos registrados</h2>
				    	<div class="login">
				    		{{ Form::open(array('url' => 'perfil/login', 'class' => 'form col-md-6 col-sm-offset-3')) }}
								<div class="form-group">
									{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder'=> 'Username')) }} 
								</div> 
								<div class="form-group">
									{{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'Contraseña')) }}  
								</div>
								<div class="form-group dow">
									<button class="btn btn-primary btn-lg btn-block">Iniciar Sesion</button>
									<span><a href="{{ URL::to('recuperar/password') }}" target="new">Olvide mi contraseña</a></span><br>
									<span><a href="{{ URL::to('MasServicios') }}">Registro de Empresa</a></span>
								</div>
							{{ Form::close() }}  
				    	</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="vacante">
				    	<h2 class="titul">Comuníquese con el Administrador de la página <a href="{{ URL::to('Contactenos') }}" style="color:  #61a75b; text-decoration:underline">Contáctenos</a></h2>
				    </div>	
		  		@endif
		  	@else
		  		<div role="tabpanel" class="tab-pane active" id="registroempresa">
			    	<div class="datos">
			    		@if(Session::has('message'))
							<div class="alert alert-info">{{ Session::get('message') }}</div>
						@endif

						{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

						{{ Form::open(array('url' => 'save/empresas' , 'files' => true, 'class' => 'form-horizontal col-sm-offset-2')) }}
							<div class="form-group">
								{{ Form::label('nombre', 'Nombre de la Empresa', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-6">
									{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre de la Empresa')) }}	
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('actividad', 'Actividad de la Empresa', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-6">
									<select class="form-control area" name="actividad" >
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
							</div>
							<div class="form-group">
								{{ Form::label('pagina', 'Página Web', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-6">
									{{ Form::text('pagina', Input::old('pagina'), array('class' => 'form-control', 'placeholder'=> 'Página Web')) }}	
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('telefono', 'Teléfono', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-6">
									{{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control convencional', 'placeholder'=> 'Teléfono')) }}	
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-6">
									{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('logo', 'Logo de la Empresa', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-6">
									{{ Form::file('archivo') }}
								</div>
							</div>
							<div class="form-group franja">
								{{ Form::label('username', 'Username', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-7">
									{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder'=> 'Username')) }}	
								</div>
							</div>
							<div class="form-group franja col-sm-offset-4">
								{{ Form::label('password', 'Contraseña', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-7">
									{{ Form::password('password',  array('class' => 'form-control', 'placeholder'=> 'Contraseña')) }}	
								</div>
							</div>
							<div class="form-group" style="margin-top: 2em">								
								{{ Form::submit('Enviar solicitud' , array('class'=> 'btn btn-primary regis', 'style' => 'padding:20px; font-size: 18px ')) }}				
							</div>
						{{ Form::close() }}
					</div>	
		   		</div>
			    <div role="tabpanel" class="tab-pane" id="busquedacandidato">
			    	<h2 class="titul">Búsqueda de candidatos registrados</h2>
			    	<div class="login">
			    		{{ Form::open(array('url' => 'perfil/login', 'class' => 'form col-md-6 col-sm-offset-3')) }}
							<div class="form-group">
								{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder'=> 'Username')) }} 
							</div> 
							<div class="form-group">
								{{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'Contraseña')) }}  
							</div>
							<div class="form-group dow">
								<button class="btn btn-primary btn-lg btn-block">Iniciar Sesión</button>
								<span><a href="{{ URL::to('recuperar/password') }}">Olvide mi contraseña</a></span><br>
								<span><a href="{{ URL::to('MasServicios') }}">Registro de Empresa</a></span>
							</div>
						{{ Form::close() }}  
			    	</div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="vacante">
			    	<h2 class="titul">Comuníquese con el Administrador de la página <a href="{{ URL::to('Contactenos') }}" style="color:  #61a75b; text-decoration:underline">Contáctenos</a></h2>
			    </div>	
		  	@endif 
		</div>
	</div>
</div>
@stop
@section('js')
<script type="text/javascript">	
    $('#candidatos').dataTable({
    	"language": {
            "url": "http://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Spanish.json"
        }
    });	
</script>
@stop

