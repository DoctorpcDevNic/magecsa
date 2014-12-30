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
				<a href="{{ URL::to('MasServicios') }}">
					<img src="{{ asset('img/capacitaciones.png') }}" class="img-responsive">
					<hr>
					<h2>Mas servicios</h2>
				</a>
			</div>
			<div class="col-md-3 col-xs-3">
        @if(Auth::check())
          <a href="{{ URL::to('Perfil/'. Auth::user()->username) }}">
            <img src="{{ asset('img/inscribete.png') }}" class="img-responsive">
            <hr>
            <h2>Registrate</h2>
          </a>
        @else
          <a href="{{ URL::to('Registrar') }}">
            <img src="{{ asset('img/inscribete.png') }}" class="img-responsive">
            <hr>
            <h2>Registrate</h2>
          </a>
        @endif
				
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
		
    	
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">      

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="{{ asset( 'img/vacantephone.png') }}" alt="..."  class="mobil">
            <img src="{{ asset( 'img/vacante.png') }}" alt="..."  class="computer imgslider">
            <div class="infovacante">
              <h3 class="fecha">
                4 de Diciembre
              </h3>
              <div class="descripcion">
                <p class="aplican">Finanzas | Contabilidad | Auditoría</p>
                <p class="lugar">Panamá Ciudad Panamá </p>
                <p class="bold computer">Requisitos</p>
                <ul class="requisitos computer">
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
          <div class="item">
            <img src="{{ asset( 'img/vacantephone.png') }}" alt="..."  class="mobil">
            <img src="{{ asset( 'img/vacante.png') }}" alt="..."  class="computer imgslider">
            <div class="infovacante">
              <h3 class="fecha">
                4 de Diciembre
              </h3>
              <div class="descripcion">
                <p class="aplican">Finanzas | Contabilidad | Auditoría</p>
                <p class="lugar">Panamá Ciudad Panamá </p>
                <p class="bold computer">Requisitos</p>
                <ul class="requisitos computer">
                  <li>-Licenciatura en contabilidad, auditoría, banca, finanzas o carreras afines. </li>
                  <li>Inglés nivel avanzado. </li>
                  <li>-Experiencia en auditoría interna(deseable)</li>
                </ul>
              </div>
              <div class="logo_slider">
                <img src="{{ asset('img/claro-logo.png') }}">
              </div>  
            </div>
          </div>
          <div class="item">
            <img src="{{ asset( 'img/vacantephone.png') }}" alt="..."  class="mobil">
            <img src="{{ asset( 'img/vacante.png') }}" alt="..."  class="computer imgslider">
            <div class="infovacante">
              <h3 class="fecha">
                4 de Diciembre
              </h3>
              <div class="descripcion">
                <p class="aplican">Finanzas | Contabilidad | Auditoría</p>
                <p class="lugar">Panamá Ciudad Panamá </p>
                <p class="bold computer">Requisitos</p>
                <ul class="requisitos computer">
                  <li>-Licenciatura en contabilidad, auditoría, banca, finanzas o carreras afines. </li>
                  <li>Inglés nivel avanzado. </li>
                  <li>-Experiencia en auditoría interna(deseable)</li>
                </ul>
              </div>
              <div class="logo_slider">
                <img src="{{ asset('img/claro-logo.png') }}">
              </div>  
            </div>
          </div>          
        </div>
         <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>        
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

	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

  	<script>
  		var myLatlng = new google.maps.LatLng(12.137221, -86.281380);

		var mapOptions = {
		  center: myLatlng,
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          scrollwheel: false,
		};

		var map = new google.maps.Map(document.getElementById("mapas"), mapOptions);

		 var lugar = new google.maps.Marker({
              position: new google.maps.LatLng(12.137221, -86.281380),
              map: map,
              animation:google.maps.Animation.BOUNCE
        });
  	</script>
@stop
