@extends('templates.maintemplate')
@section('contenido')
<div class="masservicios">
	<div role="tabpanel">

	  <!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist" id="tabservicios">
		  	@if(Auth::check())
		  		@if(Auth::user()->role_id == 2)	  			
				    <li role="presentation" class="active"><a href="#busquedacandidato" aria-controls="profile" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Busqueda por candidato</a></li>
				    <li role="presentation"><a href="#vacante" aria-controls="messages" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Publicar Vacantes</a></li>	   
		  		@else
			  		<li role="presentation" class="active"><a href="#registroempresa" aria-controls="home" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Registre su empresa</a></li>
				    <li role="presentation"><a href="#busquedacandidato" aria-controls="profile" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Busqueda por candidato</a></li>
				    <li role="presentation"><a href="#vacante" aria-controls="messages" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Publicar Vacantes</a></li>	   
		  		@endif
		  	@else
			    <li role="presentation" class="active"><a href="#registroempresa" aria-controls="home" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Registre su empresa</a></li>
			    <li role="presentation"><a href="#busquedacandidato" aria-controls="profile" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Busqueda por candidato</a></li>
			    <li role="presentation"><a href="#vacante" aria-controls="messages" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Publicar Vacantes</a></li>	   
		    @endif
		</ul>

	  	<!-- Tab panes -->
		<div class="tab-content">
		  	@if(Auth::check())
		  		@if(Auth::user()->role_id == 2)	  
		  			<div role="tabpanel" class="tab-pane" id="busquedacandidato">
				    	<h2 class="titul">Busqueda de cantidatos registrados</h2>
				    	<p>Bienvenido a la base de datos mas aplia, facil y eﬁciente con potencial 100 %  nicaragüense, acontinuacion podra hacer un  ﬁltro según sus necesidades de búsqueda para obtener a su candidato deseado, de igual manera le recordamos nuestros servicios directos de Reclutamiento, Selección y Evaluación de Personal, gracias por unirte a esta  gran familia.</p>				    	
				    </div>
				    <div role="tabpanel" class="tab-pane" id="vacante">
				    	vacante
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
									{{ Form::label('nombre', 'Nombre de la empresa', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-6">
										{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre de la empresa')) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('actividad', 'Actividad de la empresa', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-6">
										{{ Form::text('actividad', Input::old('actividad'), array('class' => 'form-control', 'placeholder'=> 'Actividad de la empresa')) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('pagina', 'Pagina Web', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-6">
										{{ Form::text('pagina', Input::old('pagina'), array('class' => 'form-control', 'placeholder'=> 'Pagina Web')) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('telefono', 'Telefono', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-6">
										{{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control convencional', 'placeholder'=> 'Telefono')) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
									<div class="col-sm-6">
										{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('logo', 'Logo de la empresa', array('class' => 'col-sm-3 control-label')) }}
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
				{{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'Password')) }}  
			</div>
			<div class="form-group dow">
				<button class="btn btn-primary btn-lg btn-block">Iniciar Sesion</button>
				<span><a href="{{ URL::to('recuperar/contraseña') }}" target="new">Olvide mi contraseña</a></span><br>
				<span><a href="http://doctorpc.com.ni/" target="new">Registro de usuario</a></span>
			</div>
		{{ Form::close() }}  
				    	</div>
				    	
				    </div>
				    <div role="tabpanel" class="tab-pane" id="vacante">
				    	vacante
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
								{{ Form::label('nombre', 'Nombre de la empresa', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-6">
									{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre de la empresa')) }}	
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('actividad', 'Actividad de la empresa', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-6">
									{{ Form::text('actividad', Input::old('actividad'), array('class' => 'form-control', 'placeholder'=> 'Actividad de la empresa')) }}	
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('pagina', 'Pagina Web', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-6">
									{{ Form::text('pagina', Input::old('pagina'), array('class' => 'form-control', 'placeholder'=> 'Pagina Web')) }}	
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('telefono', 'Telefono', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-6">
									{{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control convencional', 'placeholder'=> 'Telefono')) }}	
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
								<div class="col-sm-6">
									{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('logo', 'Logo de la empresa', array('class' => 'col-sm-3 control-label')) }}
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
			    	<p>no ve</p>
			    	
			    </div>
			    <div role="tabpanel" class="tab-pane" id="vacante">
			    	vacante
			    </div>	
		  	@endif 
		</div>
	</div>
</div>
@stop