@extends('templates.maintemplate')
@section('titulo')
	Registrarse - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="registro">
	<h2 class="titul">¡Mas Empleos, Mas Servicios!</h2>

	<div class="iconitos">
		<div class="row">
			<div class="icono col-xs-3">
				<img src="{{ asset('img/flecha.png') }}" alt="" class="flecha computer">
				<img src="{{ asset('img/user.png') }}" alt="" class="img-responsive">
				<p>1. Te registras</p>
			</div>
			<div class="icono col-xs-3">
				<img src="{{ asset('img/flecha.png') }}" alt="" class="flecha computer">
				<img src="{{ asset('img/rellena.png') }}" alt="" class="img-responsive">
				<p>2. Rellenas tus datos </p>
			</div>
			<div class="icono col-xs-3">
				<img src="{{ asset('img/flecha.png') }}" alt="" class="flecha computer">
				<img src="{{ asset('img/cv.png') }}" alt="" class="img-responsive">
				<p>3. Envías tu CV</p>
			</div>
			<div class="icono col-xs-3">
				<img src="{{ asset('img/bienvenido.png') }}" alt="" class="img-responsive">
				<p>4. Bienvenido al Equipo</p>
			</div>
		</div>	
	</div>

	<div class="campos">
		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
		{{ Form::open(array('url' => 'candidato/save', 'class' => 'form-horizontal')) }}
			<div class="categoria cuenta">
				<img src="{{ asset('img/user.png') }}" alt="" class="computer img-user">
				<img src="{{ asset('img/contrasena.png') }}" alt="" class="computer img-contra">
				<h3 class="titulother">
					<img src="{{ asset('img/datoscuenta.png') }}" alt="" class="computer">
					DATOS DE LA CUENTA
				</h3>
				<div class="campo col-sm-offset-4">
					<div class="form-group">						
					    <div class="col-sm-6">
					      {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder'=> 'Usuario')) }}						       
					    </div>
					    <div class="col-sm-4">
					    	@if( $errors->has('username') )					    		
				            	@foreach($errors->get('username') as $error )
				                	<span class="error">* {{ $error }}</span>
				             	@endforeach
				          	@endif
					    </div>
					</div>	
					<div class="form-group">
					    <div class="col-sm-6">
					      {{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'Contraseña')) }}	
					    </div>
					    <div class="col-sm-4">
					    	@if( $errors->has('password') )					    		
				            	@foreach($errors->get('password') as $error )
				                	<span class="error">* {{ $error }}</span>
				             	@endforeach
				          	@endif
					    </div>
					</div>	
					<div class="form-group">
					    <div class="col-sm-6">
					      {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=> 'Confirmar Contraseña')) }}	
					    </div>
					    <div class="col-sm-4">
					    	@if( $errors->has('password_confirmation') )					    		
				            	@foreach($errors->get('password_confirmation') as $error )
				                	<span class="error">* {{ $error }}</span>
				             	@endforeach
				          	@endif
					    </div>
					</div>	
				</div>
			</div>
			{{-- datos personales --}}
			<div class="categoria personales ">
				<h3 class="titulother">
					<img src="{{ asset('img/datospersonales.png') }}" alt="" class="computer">
					DATOS PERSONALES
				</h3>
				<div class="campo col-sm-offset-2">
					<div class="form-group">						
					    <div class="col-sm-5">
					      {{ Form::text('nombres', Input::old('nombres'), array('class' => 'form-control', 'placeholder'=> '*Nombres')) }}	
					      @if( $errors->has('nombres') )					    		
				            	@foreach($errors->get('nombres') as $error )
				                	<span class="error">* {{ $error }}</span>
				             	@endforeach
				          	@endif
					    </div>										
					    <div class="col-sm-5">
					      {{ Form::text('apellidos', Input::old('apellidos'), array('class' => 'form-control', 'placeholder'=> '*Apellidos')) }}	
					    </div>
					</div>
					<h3 class="subtitul">Fecha de Nacimiento</h3>
					<div class="form-group">						
					    <div class="col-sm-6 col-sm-offset-2">
					      {{ Form::input('date', 'fecha_nacimiento', Input::old('fecha_nacimiento'), array('class' => 'form-control')) }}	
					    </div>
					</div>
					<div class="form-group">						
					    <div class="col-sm-10">
					      {{ Form::textarea( 'direccion', Input::old('direccion'), array('class' => 'form-control','placeholder'=> '*Dirección', 'id' => 'textareainput')) }}	
					    </div>
					</div>
					<div class="form-group">						
					    <div class="col-sm-5">
					      {{ Form::email( 'email', Input::old('email'), array('class' => 'form-control','placeholder'=> '*Correo Electrónico')) }}	
					    </div>										
					    <div class="col-sm-5">
					      {{ Form::email( 'email_confirmation', Input::old('email_confirmation'), array('class' => 'form-control','placeholder'=> '*Comprobar Correo Electrónico')) }}	
					    </div>
					</div>
					<div class="form-group">						
					    <div class="col-sm-5">
					    	<select class="form-control" name="estado_civil" >
								 <option selected="selected" class="s">Estado Civil</option>
								 <option value="Soltero">Soltero</option>				
								 <option value="Casado">Casado</option>				
								 <option value="Union libre">Union libre</option>				
							</select> 
					    </div>											
					    <div class="col-sm-5">
					    	{{ Form::text('nacionalidad', Input::old('nacionalidad'), array('class' => 'form-control', 'placeholder'=> '*Nacionalidad')) }}	
					    </div>
					</div>
					<div class="form-group">						
					    <div class="col-sm-5">
					    	<select class="form-control" name="genero" >
								 <option selected="selected" class="s" value="">*Genero</option>
								 <option value="Femenino">Femenino</option>				
								 <option value="Masculino">Masculino</option>				
							</select> 
					    </div>									
					    <div class="col-sm-5">
					    	<select class="form-control" name="departamento" >
								 <option selected="selected" class="s" value=" ">*Departamento</option>
								 <option value="Atlantico Norte (RAAN)">Atlantico Norte (RAAN)</option>				
								 <option value="Atlantico Sur (RAAS)">Atlantico Sur (RAAS)</option>	
								 <option value="Boaco">Boaco</option>				
								 <option value="Carazo">Carazo</option>				
								 <option value="Chinandega">Chinandega</option>				
								 <option value="Chontales">Chontales</option>				
								 <option value="Esteli">Esteli</option>				
								 <option value="Granada">Granada</option>				
								 <option value="Jinotega">Jinotega</option>				
								 <option value="Leon">Leon</option>							
								 <option value="Madriz">Madriz</option>							
								 <option value="Managua">Managua</option>							
								 <option value="Masaya">Masaya</option>							
								 <option value="Matagalpa">Matagalpa</option>							
								 <option value="Nueva Segovia">Nueva Segovia</option>							
								 <option value="Rio San Juan">Rio San Juan</option>							
								 <option value="Rivas">Rivas</option>							
							</select>
					    </div>
					</div>
					<div class="form-group">						
					    <div class="col-sm-5">
					    	<select class="form-control" name="tipo_identificacion" >
								 <option selected="selected" class="s" value=" ">*Tipo de Identificación </option>
								 <option value="Cedula">Cédula</option>				
								 <option value="Pasaporte">Pasaporte</option>				
								 <option value="Cedula de Residencia">Cédula de Residencia</option>				
							</select> 
					    </div>											
					    <div class="col-sm-5">
					    	{{ Form::text('no_identificacion', Input::old('no_identificacion'), array('class' => 'form-control cedula', 'placeholder'=> '*No. Identificación')) }}	
					    </div>
					</div>
					<div class="form-group">						
					    <div class="col-sm-5">
					    	{{ Form::text('convencional', Input::old('convencional'), array('class' => 'form-control convencional', 'placeholder'=> '*Teléfono de Casa', 'id' => 'convencional')) }}	
					    </div>											
					    <div class="col-sm-5">
					    	{{ Form::text('celular', Input::old('celular'), array('class' => 'form-control celular', 'placeholder'=> '*Teléfono Celular', 'id' => 'celular')) }}	
					    </div>
					</div>
					<div class="form-group">	
					    <div class="col-sm-5">
					    	<select class="form-control" name="vehiculo" >
								 <option selected="selected" class="s" value=" ">Posees Vehículo </option>
								 <option value="0">Si</option>				
								 <option value="1">No</option>	
							</select> 
					    </div>
					    <div class="col-sm-5">
					    	<select class="form-control" name="disponible_viajar" id="pr">
								 <option selected="selected" class="s" value=" ">Disponibilidad de Viajar </option>
								 <option value="0">Si</option>				
								 <option value="1">No</option>	
							</select> 
					    </div>					    
					</div>
					<h3 class="subtitul">Categoría de Licencia</h3>
					<div class="form-group">	
					    <div class="col-sm-4 col-xs-4">
					    	<input type="checkbox" name="categoria_licencia[]" value="Motocicleta">Motocicleta<br>
					    	<input type="checkbox" name="categoria_licencia[]" value="Profesional">Profesional<br>
					    </div>	
					     <div class="col-sm-4 col-xs-4">
					    	<input type="checkbox" name="categoria_licencia[]" value="Vehiculo liviano">Vehículo liviano<br>
					    	<input type="checkbox" name="categoria_licencia[]" value="Vehiculo pesado">Vehículo pesado<br>
					    </div>	
					     <div class="col-sm-4 col-xs-4">
					    	<input type="checkbox" name="categoria_licencia[]" value="Sin licencia">Sin licencia<br>
					    </div>	
					</div>
					<h3 class="subtitul">Objetivos/Principales Logros</h3>
					<div class="form-group">						
					    <div class="col-sm-10">
					    	{{ Form::textarea('objetivo', Input::old('objetivo'), array('class' => 'form-control', 'placeholder'=> '*Escribe aqui tus objetivos (Máximo 250 caracteres )', 'onkeypress' => 'if(this.value.length == 250){return false;}else{return toUpper(event,this);}')) }}
					    </div>
					</div>
				</div>					
			</div>
			{{--  expectativa laboral --}}
			<div class="categoria expectativa">
				<h3 class="titulother">
					<img src="{{ asset('img/expectativa.png') }}" alt="" class="computer">
					EXPECTATIVA LABORAL
				</h3>
				<div class="campo col-sm-offset-2">				
				<p class="subtitul">Importante: Al registrar tu usuario puedes editar  tu experiencia. Te invitamos a ingresar  tus últimas tres  experiencias que has tenido. Ten en consideración que algo que olvides dar a conocer puede provocar que no seas considerado para el puesto que tanto deseas.</p>
					<div class="form-group">	
					    <div class="col-sm-5 ">
					    	<select class="form-control" name="interes_laboral" >
								 <option selected="selected" class="s" value=" ">*Nivel de Interés Laboral</option>
								 <option value="Permanente">Permanente</option>				
								 <option value="Temporal">Temporal</option>	
								 <option value="Busqueda Activa">Búsqueda Activa</option>	
								 <option value="Disponibilidad Inmediata">Disponibilidad Inmediata</option>	
								 <option value="Pasantia">Pasantia</option>	
								 <option value="Por proyecto">Por proyecto</option>	
							</select> 
					    </div>
					    <div class="col-sm-5">
					    	<select class="form-control" name="expectativa_salarial" >
								<option selected="selected" class="s" value=" ">*Expectativa Salarial Mensual </option>
								<option value="menos de 200">menos de 200</option>				
								<option value="0-200">0-200</option>	
								<option value="201-300 "> 201-300</option>	
								<option value="301-600 ">301-600 </option>	
								<option value="601-900">601-900</option>	
								<option value="901-1200">901-1200</option>	
								<option value="1201-1500">1201-1500</option>	
								<option value="1501-1800">1501-1800</option>	
								<option value="1801-2100">1801-2100</option>	
								<option value="2101-2400">2101-2400</option>	
								<option value="2401-2700">2401-2700</option>	
								<option value="2701-3000">2701-3000</option>	
								<option value="3001-3300">3001-3300</option>	
								<option value="3301-3600">3301-3600</option>	
								<option value="3601-3900">3601-3900</option>	
								<option value="3901-4200">3901-4200</option>	
								<option value="4201-4500">4201-4500</option>	
								<option value="4501-4800">4501-4800</option>	
								<option value="4801-5100">4801-5100</option>
								<option value="5101-5400">5101-5400</option>	
								<option value="5401-5700">5401-5700</option>	
								<option value="5701-6000">5701-6000</option>	
								<option value="mas de 6000">mas de 6000</option>
							</select> 
					    </div>					    
					</div>	
					<div class="form-group">	
					    <div class="col-sm-5">
					    	<select class="form-control" name="ubicacion_laboral" >
								 <option selected="selected" class="s" value=" ">Ubicación de interés laboral</option>
								 <option value="Atlantico Norte (RAAN)">Atlantico Norte (RAAN)</option>				
								 <option value="Atlantico Sur (RAAS)">Atlantico Sur (RAAS)</option>	
								 <option value="Boaco">Boaco</option>				
								 <option value="Carazo">Carazo</option>				
								 <option value="Chinandega">Chinandega</option>				
								 <option value="Chontales">Chontales</option>				
								 <option value="Esteli">Esteli</option>				
								 <option value="Granada">Granada</option>				
								 <option value="Jinotega">Jinotega</option>				
								 <option value="Leon">Leon</option>							
								 <option value="Madriz">Madriz</option>							
								 <option value="Managua">Managua</option>							
								 <option value="Masaya">Masaya</option>							
								 <option value="Matagalpa">Matagalpa</option>							
								 <option value="Nueva Segovia">Nueva Segovia</option>							
								 <option value="Rio San Juan">Rio San Juan</option>							
								 <option value="Rivas">Rivas</option>			
							</select> 
					    </div>	
					    <div class="col-sm-5">
					   		<input type="hidden" name="areasseleccionadas" id="areasseleccionadas">								    	
					    	<select class="form-control" name="areas_interes" id="areas_interesR">
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
					    <div class="col-sm-5">
					    	<select class="form-control" name="puesto_interes" >
								 <option selected="selected" class="s" value=" ">Puestos de Interés </option>
								 <option value="Ejecutivos de Ventas">Ejecutivos de Ventas</option>				
								 <option value="Vendedor|Rutero">Vendedor|Rutero</option>	
								 <option value="Jefe de Ventas|Supervisor">Jefe de Ventas|Supervisor</option>	
								 <option value="Promotor de Ventas|Impulsador|Display">Promotor de Ventas|Impulsador|Display</option>	
								 <option value="Jefe de Mercadeo">Jefe de Mercadeo</option>	
								 <option value="Analista de Mercadeo|Investigacion de Mercado">Analista de Mercadeo|Investigacion de Mercado</option>	
								 <option value="Jefe de Impulsadoras">Jefe de Impulsadoras</option>	
								 <option value="Jefe de Sucursal|Tienda">Jefe de Sucursal|Tienda</option>	
								 <option value="Gerente Trade Marketing">Gerente Trade Marketing</option>	
								 <option value="Asistente de Ventas|Mercadeo">Asistente de Ventas|Mercadeo</option>	
								 <option value="Director Comercial|Gerente">Director Comercial|Gerente</option>	
								 <option value="Edecan">Edecan</option>	
								 <option value="Ejecutivo de Telemarketing">Ejecutivo de Telemarketing</option>	
								 <option value="Director Comercial|Gerente">Director Comercial|Gerente</option>	
								 <option value="Gerente de Cuentas Claves">Gerente de Cuentas Claves</option>	
								 <option value="Gerente de Mercadeo | Ventas">Gerente de Mercadeo | Ventas</option>	
								 <option value="Gerente de Marca|Producto">Gerente de Marca|Producto</option>	
								 <option value="Jefe de Marca|Producto">Jefe de Marca|Producto</option>	
								 <option value="Merchandiser">Merchandiser</option>	
								 <option value="Cajero Bancario">Cajero Bancario</option>	
								 <option value="Analista de Credito">Analista de Credito</option>	
								 <option value="Gerente de Sucursal|Agencia">Gerente de Sucursal|Agencia</option>	
								 <option value="Ejecutivo de Afiliacion|Tarjetas de Credito y Debito">Ejecutivo de Afiliacion|Tarjetas de Credito y Debito</option>	
								 <option value="Ejecutivo de Servicios Bancarios">Ejecutivo de Servicios Bancarios</option>	
								 <option value="Ejecutivo  de Cuentas|Corporativo">Ejecutivo  de Cuentas|Corporativo</option>	
								 <option value="Gerente de Credito|Riesgo">Gerente de Credito|Riesgo</option>	
								 <option value="Gerente de Operaciones Financieras">Gerente de Operaciones Financieras</option>	
								 <option value="Otros puestos Bancarios">Otros puestos Bancarios</option>	
								 <option value="Gerente Legal">Gerente Legal</option>	
								 <option value="Gerente Departamento Internacional">Gerente Departamento Internacional</option>	
								 <option value="Gerente  de Cumplimiento">Gerente  de Cumplimiento</option>	
								 <option value="Gestor de Riesgo">Gestor de Riesgo</option>	
								 <option value="Gerente de Control de Calidad">Gerente de Control de Calidad</option>	
								 <option value="Jefe  de Produccion|Supervisor">Jefe  de Produccion|Supervisor</option>	
								 <option value="Asistente de Control de Calidad">Asistente de Control de Calidad</option>	
								 <option value="Asistente de Produccion">Asistente de Produccion</option>	
								 <option value="Director de Produccion|Gerente|Planta">Director de Produccion|Gerente|Planta</option>	
								 <option value="Ingeniero de Planta y Procesos">Ingeniero de Planta y Procesos</option>	
								 <option value="Jefe de Seguridad Industrial|Oficial">Jefe de Seguridad Industrial|Oficial</option>	
								 <option value="Jefe de Higiene y Seguridad">Jefe de Higiene y Seguridad</option>	
								 <option value="Jefe de Control de Calidad|Supervisor">Jefe de Control de Calidad|Supervisor</option>	
								 <option value="Ingeniero Civil">Ingeniero Civil</option>	
								 <option value="Ingeniero en Sistema">Ingeniero en Sistema</option>	
								 <option value="Abogado">Abogado</option>	
								 <option value="Ingeniero Industrial">Ingeniero Industrial</option>	
								 <option value="Gerente de Proyecto|Jefe|Tecnico">Gerente de Proyecto|Jefe|Tecnico</option>	
								 <option value="Psicologo">Psicologo</option>	
								 <option value="Ingeniero Quimico">Ingeniero Quimico</option>	
								 <option value="Contador">Contador</option>	
								 <option value="Administrado de Empresas">Administrado de Empresas</option>	
								 <option value="Magisterio">Magisterio</option>	
								 <option value="Ingeniero Mecanico">Ingeniero Mecanico</option>	
								 <option value="Licenciado en Computacion">Licenciado en Computacion</option>	
								 <option value="Economista ">Economista </option>	
								 <option value="Ingeniero Agronomo">Ingeniero Agronomo</option>	
								 <option value="Biologo">Biologo</option>	
								 <option value="Sociologo">Sociologo</option>	
								 <option value="Ingeniero Electrico">Ingeniero Electrico</option>	
								 <option value="Asistente Administrativo">Merchandiser</option>	
								 <option value="Asistente de Presidencia|Gerencia General">Asistente de Presidencia|Gerencia General</option>	
								 <option value="Analista de Organización y Metodo">Analista de Organización y Metodo</option>	
								 <option value="Gerente Administrativo|Jefe">Gerente Administrativo|Jefe</option>	
								 <option value="Director General|Gerente">Director General|Gerente</option>	
								 <option value="Gerente de Pais">Gerente de Pais</option>	
								 <option value="Jefe de Seguridad">Jefe de Seguridad</option>	
								 <option value="Gerente de Planificacion">Gerente de Planificacion</option>	
								 <option value="Analista |Programador">Analista |Programador</option>	
								 <option value="Analista de Sistema">Analista de Sistema</option>	
								 <option value="Administrador de Redes">Administrador de Redes</option>	
								 <option value="Diseñador Web">Diseñador Web</option>	
								 <option value="Gerente de Informatica|Sistema">Gerente de Informatica|Sistema</option>	
								 <option value="Operador de Sistema">Operador de Sistema</option>	
								 <option value="Soporte Tecnico">Soporte Tecnico</option>	
								 <option value="Jefe de Informatica|Soporte Tecnico|Sistema">Jefe de Informatica|Soporte Tecnico|Sistema</option>	
								 <option value="Tecnico en Telecomunicaciones|Redes">Tecnico en Telecomunicaciones|Redes</option>	
								 <option value="Gerente de Telecomunicaciones">Gerente de Telecomunicaciones</option>	
								 <option value="Gerente de Redes|Internet">Gerente de Redes|Internet</option>	
								 <option value="Gerente de Telefonia Celular">Gerente de Telefonia Celular</option>	
								 <option value="Gerente de Transmision">Gerente de Transmision</option>	
								 <option value="Jefe de Proyecto|Supervisor">Jefe de Proyecto|Supervisor</option>	
								 <option value="Gerente de Interconexion">Gerente de Interconexion</option>	
								 <option value="Asistente de Operaciones">Asistente de Operaciones</option>	
								 <option value="Jefe de Operaciones y Logistica|Encargado">Jefe de Operaciones y Logistica|Encargado</option>	
								 <option value="Agente aduanero|Tramitador Aduanal">Agente aduanero|Tramitador Aduanal</option>	
								 <option value="Facturador">Facturador</option>	
								 <option value="Jefe de Despacho|Encargado|o Recepcion">Jefe de Despacho|Encargado|o Recepcion</option>	
								 <option value="Jefe de Transporte|Trafico">Jefe de Transporte|Trafico</option>	
								 <option value="Auditor de Sistemas">Auditor de Sistemas</option>	
								 <option value="Auxiliar de Bodega">Auxiliar de Bodega</option>	
								 <option value="Gerente de Bodega|Jefe">Gerente de Bodega|Jefe</option>	
								 <option value="Asistente de Inventario">Asistente de Inventario</option>	
								 <option value="Bodeguero">Bodeguero</option>	
								 <option value="Montacarguista">Montacarguista</option>	
								 <option value="Jefe de Inventario">Jefe de Inventario</option>	
								 <option value="Gerente de Repuestos">Gerente de Repuestos</option>	
								 <option value="Gerente de Mantenimiento|Servicios">Gerente de Mantenimiento|Servicios</option>	
								 <option value="Asistente de Mantenimiento">Asistente de Mantenimiento</option>	
								 <option value="Electricista">Electricista</option>	
								 <option value="Mecanico|Automotriz">Mecanico|Automotriz</option>	
								 <option value="Operador de Maquinaria Industrial">Operador de Maquinaria Industrial</option>	
								 <option value="Operador de Maquinaria Pesada">Operador de Maquinaria Pesada</option>	
								 <option value="Tecnico en Refrigeracion">Tecnico en Refrigeracion</option>	
								 <option value="Jefe de Mantenimiento|Supervisor">Jefe de Mantenimiento|Supervisor</option>	
								 <option value="Gerente de Talleres">Gerente de Talleres</option>	
								 <option value="Gerente de Servicio al Cliente|Jefe">Gerente de Servicio al Cliente|Jefe</option>	
								 <option value="Copywriter">Copywriter</option>	
								 <option value="Asistente de Comunicaciones|Relaciones Publicas">Asistente de Comunicaciones|Relaciones Publicas</option>	
								 <option value="Ejecutiva de Servicio al Cliente">Ejecutiva de Servicio al Cliente</option>	
								 <option value="Diseñador Grafico">Diseñador Grafico</option>	
								 <option value="Jefe de Publicidad">Jefe de Publicidad</option>	
								 <option value="Coordinador de Eventos">Coordinador de Eventos</option>	
								 <option value="Gerente de Publicidad y Promocion">Gerente de Publicidad y Promocion</option>	
								 <option value="Asistente de Publicidad">Asistente de Publicidad</option>	
								 <option value="Jefe de Prensa">Jefe de Prensa</option>	
								 <option value="Consultoria ">Consultoria </option>	
								 <option value="Capacitaciones|Induccion">Capacitaciones|Induccion</option>	
								 <option value="Conserjeria">Conserjeria</option>	
								 <option value="Jardineria">Jardineria</option>	
								 <option value="Agente de Televentas">Agente de Televentas</option>	
								 <option value="Ejecutivo de Call Center">Ejecutivo de Call Center</option>	
								 <option value="Agente de Servicio">Agente de Servicio</option>	
								 <option value="Agente de Soporte">Agente de Soporte</option>	
								 <option value="Cocinero">Cocinero</option>	
								 <option value="Asistente de Cocina">Asistente de Cocina</option>	
								 <option value="Mesero">Mesero</option>	
								 <option value="Panadero">Panadero</option>	
								 <option value="Repartidor">Repartidor</option>	
								 <option value="Chef">Chef</option>	
								 <option value="Edecan">Edecan</option>	
								 <option value="Asistente de Recursos Humanos">Asistente de Recursos Humanos</option>	
								 <option value="Generalista de Recursos Humanos">Generalista de Recursos Humanos</option>	
								 <option value="Reclutador">Reclutador</option>	
								 <option value="Asistente de Nomina">Asistente de Nomina</option>	
								 <option value="Jefe de Reclutamiento y Selección">Jefe de Reclutamiento y Selección</option>	
								 <option value="Gerente de Capacitacion|Jefe">Gerente de Capacitacion|Jefe</option>	
								 <option value="Gerente de Compensacion|Beneficios">Gerente de Compensacion|Beneficios</option>	
								 <option value="Gerente de Recursos Humanos||Jefe">Gerente de Recursos Humanos||Jefe</option>	
								 <option value="Encargado de Compesacion">Encargado de Compesacion</option>	
								 <option value="Encargado de Reclutamiento">Encargado de Reclutamiento</option>	
								 <option value="Encargado de Desarrollo Organizacional">Encargado de Desarrollo Organizacional</option>	
								 <option value="Encargado de Licitacion">Encargado de Licitacion</option>	
								 <option value="Asistente de Compra">Asistente de Compra</option>	
								 <option value="Comprador">Comprador</option>	
								 <option value="Gerente de Compra|Jefe">Gerente de Compra|Jefe</option>	
								 <option value="Medico General">Medico General</option>	
								 <option value="Optometrista">Optometrista</option>	
								 <option value="Oftamologo">Oftamologo</option>	
								 <option value="Asistente Dental">Asistente Dental</option>	
								 <option value="Nutricionista">Nutricionista</option>	
								 <option value="Farmaceutico">Farmaceutico</option>	
								 <option value="Odontologo">Odontologo</option>	
								 <option value="Regente">Regente</option>	
								 <option value="Visitador Medico">Visitador Medico</option>	
								 <option value="Terapeuta">Terapeuta</option>	
								 <option value="Veterinario">Veterinario</option>	
								 <option value="Enfermera Profesional">Enfermera Profesional</option>	
								 <option value="Digitador">Digitador</option>	
								 <option value="Recepcionista|Bilingüe">Recepcionista|Bilingüe</option>	
								 <option value="Mensajero">Mensajero</option>	
								 <option value="Secretaria Ejecutiva|Bilingüe">Secretaria Ejecutiva|Bilingüe</option>	
								 <option value="Gestor de Cobro">Gestor de Cobro</option>	
								 <option value="Chofer">Chofer</option>	
								 <option value="Trabajador Social">Trabajador Social</option>	
								 <option value="Pasantes">Pasantes</option>	
								 <option value="Asistente de Servicios Generales">Asistente de Servicios Generales</option>	
								 <option value="Oficial de Seguridad">Oficial de Seguridad</option>	
							</select> 
					    </div>	
					    <div class="col-sm-5">
					    	<select class="form-control" name="horario" >
								 <option selected="selected" class="s" value=" ">Horario </option>
								 <option value="Diurno">Diurno</option>				
								 <option value="Nocturno">Nocturno</option>	
								 <option value="Horario Alternos">Horario Alternos</option>	
								 <option value="Por Temporada">Por Temporada</option>	
								 <option value="Medio Tiempo">Medio Tiempo</option>									 
							</select> 
					    </div>					    
					</div>
				</div>	
			</div>
			{{-- experiencia profesional --}}	
			<div class="categoria experiencia">
				<h3 class="titulother">
					<img src="{{ asset('img/experiencia.png') }}" alt="" class="computer">
					EXPERIENCIA PROFESIONAL
				</h3>
				<div class="campo col-sm-offset-2">
					<div class="form-group">						
					    <div class="col-sm-5">
					    	{{ Form::text('nombre_empresa', Input::old('nombre_empresa'), array('class' => 'form-control', 'placeholder'=> '*Nombre de la Empresa')) }}	
					    </div>
					    <div class="col-sm-5">
					    	<select class="form-control" name="actividad_empresa" >
								 <option selected="selected" class="s" value=" ">*Actividad de la Empresa</option>
								 <option value="Aduana|Agencia Aduaneras">Aduana|Agencia Aduaneras</option>				
								 <option value="Agencia de Empleo|Reclutamiento">Agencia de Empleo|Reclutamiento</option>	
								 <option value="Agricola|Ganadera">Agricola|Ganadera</option>	
								 <option value="Agroindustrial">Agroindustrial</option>	
								 <option value="Arquitectura|Diseño|Decoracion">Arquitectura|Diseño|Decoracion</option>									 
								 <option value="Automotriz">Automotriz</option>	
								 <option value="Auditoria">Auditoria</option>	
								 <option value="Bancos|Financieras">Bancos|Financieras</option>	
								 <option value="Bienes Raices">Bienes Raíces</option>	
								 <option value="Bufete de Abogado">Bufete de Abogado</option>	
								 <option value="Call Center">Call Center</option>	
								 <option value="Comercial|Mayorista|Minorista">Comercial|Mayorista|Minorista</option>	
								 <option value="Confecciones">Confecciones</option>	
								 <option value="Construccion">Construccion</option>	
								 <option value="Consultoria|Asesoria">Consultoria|Asesoria</option>	
								 <option value="Consumo Masivo|Bebida|Alimentos">Consumo Masivo|Bebida|Alimentos</option>	
								 <option value="Exportacion|Importacion">Exportacion|Importacion</option>	
								 <option value="Farmaceutica">Farmaceutica</option>	
								 <option value="Hoteleria|Turismo|Restaurante">Hoteleria|Turismo|Restaurante</option>	
								 <option value="Inmobiliaria|Propiedades">Inmobiliaria|Propiedades</option>	
								 <option value="Imprenta|Editoriales">Imprenta|Editoriales</option>	
								 <option value="Logistica|Distribucion">Logistica|Distribucion</option>	
								 <option value="Opticas">Opticas</option>	
								 <option value="ONG">ONG</option>	
								 <option value="Manufacturas Varias">Manufacturas Varias</option>	
								 <option value="Maquilas">Maquilas</option>	
								 <option value="Medicina|Salud">Medicina|Salud</option>	
								 <option value="Seguros|Agencia">Seguros|Agencia</option>	
								 <option value="Servicios Financieros varios">Servicios Financieros varios</option>	
								 <option value="Telecomunicaciones">Telecomunicaciones</option>	
								 <option value="Transporte">Transporte</option>	
								 <option value="Ventas">Ventas</option>	
							</select> 
					    </div>					    
					</div>
					<div class="form-group">						
					    <div class="col-sm-5">
					    	{{ Form::text('telefono_empresa', Input::old('telefono_empresa'), array('class' => 'form-control convencional', 'placeholder'=> '*Teléfono de Empresa')) }}	
					    </div>
					    <div class="col-sm-5">
					    	<select class="form-control" name="area" >
								 <option selected="selected" class="s" value=" ">*Área Funcional</option>
								 <option value="Mercadeo|Ventas">Mercadeo|Ventas</option>				
								 <option value="Banca|Servicios Financieros">Banca|Servicios Financieros</option>	
								 <option value="Finanza|Contabilidad|Auditoria">Finanza|Contabilidad|Auditoria</option>	
								 <option value="Produccion|Ingenieria|Calidad">Produccion|Ingenieria|Calidad</option>	
								 <option value="Puestos Profesionales">Puestos Profesionales</option>
								 <option value="Administracion">Administración</option>
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
					    <div class="col-sm-6 col-sm-offset-2">
					    	{{ Form::text('puesto', Input::old('puesto'), array('class' => 'form-control', 'placeholder'=> '*Puesto o Cargo Desempeñado')) }}	
					    </div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-5 ">
							<h3 class="subtitul" style="width: 100%">Fecha Inicio</h3>				
					    	{{ Form::input('date','fecha_inicio', Input::old('fecha_inicio'), array('class' => 'form-control')) }}	
					    </div>
						<div class="col-sm-5 ">
							<h3 class="subtitul" style="width: 100%">Fecha Fin</h3>				
					    	{{ Form::input('date','fecha_fin', Input::old('fecha_fin'), array('class' => 'form-control')) }}	
					    </div>
					</div>
					<div class="form-group">						
					    <div class="col-sm-10">
					    	{{ Form::textarea('logros', Input::old('logros'), array('class' => 'form-control', 'placeholder'=> 'Logros (Máximo 250 caracteres )','onkeypress' => 'if(this.value.length == 250){return false;}else{return toUpper(event,this);}')) }}
					    </div>
					</div>
					<div class="form-group">						
					    <div class="col-sm-10">
					    	{{ Form::textarea('funciones', Input::old('funciones'), array('class' => 'form-control', 'placeholder'=> '*Descripción breve de principales funciones en el puesto (Máximo 250 caracteres )', 'onkeypress' => 'if(this.value.length == 250){return false;}else{return toUpper(event,this);}')) }}
					    </div>
					</div>
					<div class="form-group">	
					    <div class="col-sm-5">
					    	<select class="form-control" name="superior" id="superior">
								 <option selected="selected" class="s" value=" ">Contactar Superior </option>
								 <option value="0">No</option>				
								 <option value="1">Si</option>	
							</select> 
					    </div>			
					    <div class="col-sm-5">
					    	{{ Form::text('nombre_contacto', Input::old('nombre_contacto'), array('class' => 'form-control inabil', 'placeholder'=> '*Nombre de Contacto')) }}	
					    </div>
					</div>
					<div class="form-group">						
					    <div class="col-sm-5">
					    	{{ Form::text('telefono_contacto', Input::old('telefono_contacto'), array('class' => 'form-control inabil', 'placeholder'=> '*Teléfono de Contacto')) }}	
					    </div>			
					    <div class="col-sm-5">
					    	{{ Form::text('email_contacto', Input::old('email_contacto'), array('class' => 'form-control inabil', 'placeholder'=> 'E-mail de Contacto')) }}	
					    </div>
					</div>
				</div>
			</div>	
			{{--Educacion Academica --}}
			<div class="categoria educacion">
				<h3 class="titulother">
					<img src="{{ asset('img/educacion.png') }}" alt="" class="computer">
					FORMACIÓN ACADÉMICA
				</h3>
				<div class="campo col-sm-offset-2">
					<div class="form-group">	
					    <div class="col-sm-5">
					    	<select class="form-control" name="nivel_academico" >
								 <option selected="selected" class="s" value=" ">*Nivel Académico </option>
								 <option value="Primaria">Primaria</option>				
								 <option value="Bachillerato Secundaria">Bachillerato Secundaria</option>	
								 <option value="Estudiante Universitario">Estudiante Universitario</option>				
								 <option value="Tecnico Medio">Tecnico Medio</option>				
								 <option value="Tecnico Superior">Tecnico Superior</option>				
								 <option value="Egresado|Pensum Cerrado">Egresado|Pensum Cerrado</option>				
								 <option value="Licenciatura">Licenciatura</option>				
								 <option value="Ingenieria">Ingenieria</option>				
								 <option value="Postgrado">Postgrado</option>				
								 <option value="Maestria">Maestria</option>				
								 <option value="Doctorado">Doctorado</option>				
								 <option value="Sin Estudios Formales">Sin Estudios Formales</option>				
							</select> 
					    </div>	
					    <div class="col-sm-5">
					    	<select class="form-control" name="instituto" >
								 <option selected="selected" class="s" value=" ">*Institución </option>
								 <option value="Ave Maria University">Ave Maria University</option>				
								 <option value="Universidad Americana">Universidad Americana</option>	
								 <option value="Universidad Catolica">Universidad Catolica</option>				
								 <option value="Universidad Centroamericana">Universidad Centroamericana</option>				
								 <option value="Universidad de Centroamericana de Ciencias Empresariales ">Universidad de Centroamericana de Ciencias Empresariales </option>				
								 <option value="Universidad de Ciencias Comerciales">Universidad de Ciencias Comerciales</option>				
								 <option value="Universidad Iberoamericana de Ciencia y Tecnologia">Universidad Iberoamericana de Ciencia y Tecnologia</option>				
								 <option value="Universidad Nacional Agraria">Universidad Nacional Agraria</option>				
								 <option value="Universidad Nacional Autonoma de Nicaragua">Universidad Nacional Autónoma de Nicaragua</option>				
								 <option value="Universidad Nacional de Ingenieria">Universidad Nacional de Ingeniería</option>				
								 <option value="Universidad Politecnica de Nicaragua">Universidad Politécnica de Nicaragua</option>				
								 <option value="U. de las Regiones Autonomas de la Costa Caribe Nicaraguense">U. de las Regiones Autonomas de la Costa Caribe Nicaragüense</option>				
								 <option value="Instituto Centroamericano de Administracion de Empresas">Instituto Centroamericano de Administracion de Empresas</option>				
								 <option value="Otras Instituciones">Otras Instituciones</option>	
							</select> 
					    </div>		
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
					    	{{ Form::text('titulo', Input::old('titulo'), array('class' => 'form-control', 'placeholder'=> '*Titulo')) }}	
					    </div>    
					</div>
					<h3 class="subtitul">Año de Finalización</h3>
					<div class="form-group">						
					    <div class="col-sm-6 col-sm-offset-2">
					    	{{ Form::input('date','fecha_finalizacion', Input::old('fecha_finalizacion'), array('class' => 'form-control')) }}	
					    </div>
					</div>
				</div>	
			</div>
			{{-- Otros estudios --}}
			<div class="categoria estudios">
				<h3 class="titulother">
					<img src="{{ asset('img/otros.png') }}" alt="" class="computer">
					OTROS ESTUDIOS
				</h3>
				<div class="campo col-sm-offset-2">
					<div class="form-group">	
					    <div class="col-sm-5">
					    	<select class="form-control" name="idioma" >
								 <option selected="selected" class="s" value=" ">Idioma</option>
								 <option value="Aleman">Aleman</option>				
								 <option value="Arabe">Arabe</option>	
								 <option value="Cantones">Cantones</option>				
								 <option value="Chino - Mandarin">Chino - Mandarin</option>				
								 <option value="Español">Español</option>
								 <option value="Frances">Frances</option>
								 <option value="Ingles">Ingles</option>
								 <option value="Italiano">Italiano</option>	
								 <option value="Japones">Japones</option>	
								 <option value="Portugues">Portugues</option>	
								 <option value="Ruso">Ruso</option>	
								 <option value="Taiwanes">Taiwanes</option>	
							</select> 
					    </div>
					    <div class="col-sm-5">
					    	<select class="form-control" name="nivel_dominio" >
								 <option selected="selected" class="s" value=" ">Nivel de Dominio </option>
								 <option value="Basico">Basico</option>				
								 <option value="Intermedio">Intermedio</option>	
								 <option value="Avanzado">Avanzado</option>				
								 <option value="Nativo">Nativo</option>				
								 <option value="Bilingüe">Bilingüe</option>	
							</select> 
					    </div>					    
					</div>
					<h3 class="subtitul">Habilidades Técnicas</h3>
					<div class="form-group">
					 	<div class="col-sm-5">	
					 		{{ Form::text('habilidad1', Input::old('habilidad1'), array('class' => 'form-control', 'placeholder'=> '*Habilidades')) }}						
					 	</div>
					    <div class="col-sm-5">
					    	<select class="form-control" name="nivel_dominio1" >
								 <option selected="selected" class="s" value=" ">Nivel de Dominio </option>
								 <option value="Basico">Básico</option>				
								 <option value="Intermedio">Intermedio</option>	
								 <option value="Avanzado">Avanzado</option>	
							</select> 
					    </div>		
					</div>
					<div class="form-group">
					 	<div class="col-sm-5">	
					 		{{ Form::text('habilidad2', Input::old('habilidad2'), array('class' => 'form-control', 'placeholder'=> '*Habilidades')) }}						
					 	</div>
					    <div class="col-sm-5">
					    	<select class="form-control" name="nivel_dominio2" >
								 <option selected="selected" class="s" value=" ">Nivel de Dominio </option>
								 <option value="Basico">Básico</option>				
								 <option value="Intermedio">Intermedio</option>	
								 <option value="Avanzado">Avanzado</option>
							</select> 
					    </div>		
					</div>
					<div class="form-group">
					 	<div class="col-sm-5">	
					 		{{ Form::text('habilidad3', Input::old('habilidad3'), array('class' => 'form-control', 'placeholder'=> '*Habilidades')) }}						
					 	</div>
					    <div class="col-sm-5">
					    	<select class="form-control" name="nivel_dominio3" >
								 <option selected="selected" class="s" value=" ">Nivel de Dominio </option>
								 <option value="Basico">Básico</option>				
								 <option value="Intermedio">Intermedio</option>	
								 <option value="Avanzado">Avanzado</option>	
							</select> 
					    </div>		
					</div>	
				</div>
			</div>	
			<h3 class="divider"></h3>
			<div class="alert alert-danger" role="alert">
			  <p class="alert-link" style="text-align:center">Al registrarse, esta aceptando los términos y condiciones de nuestra <a href="{{ asset('document/PoliticasDePrivacidad.pdf') }}" target="new"a>Política de Privacidad</a> y <a href="{{ asset('document/CondicionesDeUso.pdf') }}" target="new">Condiciones de Uso</a></a>
			</div>
			<div class="form-group">								
					{{ Form::submit('Registrar' , array('class'=> 'btn btn-primary regis')) }}				
			</div>
		{{ Form::close() }}	
	</div>
</div>
@stop
@section('js')
<script type="text/javascript">
	

</script>

<script type="text/javascript">
$(function(){
	$("#areas_interesR").multiselect({
		header: "Selecciona 3 Áreas de interes",
		classes: 'width-select',
		selectedList: 3,
		click: function(e){
	       if( $(this).multiselect("widget").find("input:checked").length > 3 ){	           
	           return false;
	       } 
	   },
	   multiple: true
	});
});
</script>
@stop
