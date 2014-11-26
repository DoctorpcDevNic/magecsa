@extends('templates.maintemplate')
@section('titulo')
	Mas Empleos Y Servicios | MAGECSA
@stop

@section('contenido')
	<div class="menuother">
		<div class="row">
			<div class="col-md-3 col-xs-3">
				<a href="">
					<img src="{{ asset('img/oportunidad.png') }}" class="img-responsive">
					<hr>
					<h2>Mas empleos</h2>
				</a>	
			</div>
			<div class="col-md-3 col-xs-3">
				<a href="">
					<img src="{{ asset('img/capacitaciones.png') }}" class="img-responsive">
					<hr>
					<h2>Mas servicios</h2>
				</a>
			</div>
			<div class="col-md-3 col-xs-3">
				<a href="">
					<img src="{{ asset('img/inscribete.png') }}" class="img-responsive">
					<hr>
					<h2>Registrate</h2>
				</a>
			</div>
			<div class="col-md-3 col-xs-3">
				<a href="">
					<img src="{{ asset('img/bd.png') }}" class="img-responsive">
					<hr>
					<h2>Base de datos </h2>
				</a>
			</div>
		</div>
	</div>

	<div class="divider">
		<hr>
	</div>

	<div class="vacante">
		<h2>Vacantes</h2>

		{{-- Slider Vacante Mobil --}}
		<div class="fluid_container hidden-lg hidden-md">              
        	<div class="camera_wrap camera_azure_skin" id="camera_wrap_2">
            	<div data-src="{{ asset( 'img/vacantephone.png' )}}">
                  	<div class="infovacante">
                  		<h3 class="fecha">
                  			4 de Diciembre
                  		</h3>
                  		<div class="descripcion">
                  			<p class="aplican">Finanzas | Contabilidad | Auditoría</p>
                  			<p class="lugar">Panamá Ciudad Panamá </p>
                  			<p class="bold">Requisitos</p>
                  			<ul class="requisitos">
                  				<li>-Licenciatura en contabilidad, auditoría, banca, finanzas o carreras afines. </li>
                  				<li>Inglés nivel avanzado. </li>
                  				<li>-Experiencia en auditoría interna(deseable)</li>
                  			</ul>
                  		</div>
                  	</div> 	
                    <div class="logo_slider">
                    	<img src="{{ asset('img/claro-logo.png') }}">
                    </div>
              	</div>
              	<div data-src="{{ asset( 'img/vacantephone.png') }}">
                   	<div class="infovacante">
                  		<h3 class="fecha">
                  			4 de Diciembre
                  		</h3>
                  		<div class="descripcion">
                  			<p class="aplican">Finanzas | Contabilidad | Auditoría</p>
                  			<p class="lugar">Panamá Ciudad Panamá </p>
                  			<p class="bold">Requisitos</p>
                  			<ul class="requisitos">
                  				<li>-Licenciatura en contabilidad, auditoría, banca, finanzas o carreras afines. </li>
                  				<li>Inglés nivel avanzado. </li>
                  				<li>-Experiencia en auditoría interna(deseable)</li>
                  			</ul>
                  		</div>
                  	</div> 	
                    <div class="logo_slider">
                    	<img src="{{ asset('img/claro-logo.png') }}">
                    </div>
              	</div>
              	<div data-src="{{ asset( 'img/vacantephone.png') }}">
              		<div class="infovacante">
                  		<h3 class="fecha">
                  			4 de Diciembre
                  		</h3>
                  		<div class="descripcion">
                  			<p class="aplican">Finanzas | Contabilidad | Auditoría</p>
                  			<p class="lugar">Panamá Ciudad Panamá </p>
                  			<p class="bold">Requisitos</p>
                  			<ul class="requisitos">
                  				<li>-Licenciatura en contabilidad, auditoría, banca, finanzas o carreras afines. </li>
                  				<li>Inglés nivel avanzado. </li>
                  				<li>-Experiencia en auditoría interna(deseable)</li>
                  			</ul>
                  		</div>
                  	</div> 	
              		<div class="logo_slider">
                    	<img src="{{ asset('img/claro-logo.png') }}">
                    </div>
              	</div>
          	</div>
    	</div>
    	{{-- End  --}}	
	</div>

	<div class="clear"></div>

	<div class="ubicacion">
		<h2 class="titul">Nuestra ubicacion en el mapa</h2>
		<hr>
		<div id="mapas" class="mapa"></div>
	</div>
@stop

@section('js')
	<script>
	    jQuery(function(){
	      
	      jQuery('#camera_wrap_2').camera({        
	        height: '25%',   
	        pagination: false,       
	      });
	      
	    });
  	</script>

	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

  	<script>
  		var myLatlng = new google.maps.LatLng(12.140148, -86.282335);

		var mapOptions = {
		  center: myLatlng,
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          scrollwheel: false,
		};

		var map = new google.maps.Map(document.getElementById("mapas"), mapOptions);

		 var lugar = new google.maps.Marker({
              position: new google.maps.LatLng(12.140148, -86.282335),
              map: map,
              animation:google.maps.Animation.BOUNCE
        });
  	</script>
@stop
