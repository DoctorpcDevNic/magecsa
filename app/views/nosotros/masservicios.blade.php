@extends('templates.maintemplate')
@section('contenido')
<div class="masservicios">
	<div role="tabpanel">

	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#registroempresa" aria-controls="home" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Registre su empresa</a></li>
	    <li role="presentation"><a href="#busquedacandidato" aria-controls="profile" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Busqueda por candidato</a></li>
	    <li role="presentation"><a href="#vacante" aria-controls="messages" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Publicar Vacantes</a></li>	   
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane active" id="registroempresa">
	    	<div class="row ">
	    		<div class="col-md-4 logoempresa">
	    			<img src="{{ asset('img/claro-logo.png') }}">
	    		</div>
	    		<div class="col-md-8 datosempresa">
	    			
	    		</div>
	    	</div>
	    </div>
	    <div role="tabpanel" class="tab-pane" id="busquedacandidato">
	    	<h2 class="titul">Busqueda de cantidatos registrados</h2>
	    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	    	<div class="filtro">
	    		<div class="row">
	    			<div class="col-md-6">
	    			
	    			</div>
	    			<div class="col-md-6"></div>
	    		</div>
	    	</div>
	    </div>
	    <div role="tabpanel" class="tab-pane" id="vacante">
	    	vacante
	    </div>	    
	  </div>

	</div>
</div>
@stop