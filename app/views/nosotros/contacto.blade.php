@extends('templates.maintemplate')
@section('titulo')
	Contacto - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

	<div class="contacto">
		<h2 class="titul">Contáctenos</h2>
		
 		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

		{{ Form::open(array('url' => 'Contacto/send', 'class' => 'form-horizontal')) }}
			<div class="form-group">
				{{ Form::label('nombre', 'Nombre y Apellido', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-8">
					{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre y Apellido')) }}	
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('razon', 'Razon Social', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-8">
					{{ Form::text('razon', Input::old('razon'), array('class' => 'form-control', 'placeholder'=> 'Razon Social')) }}	
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Correo Electronico', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-8">
					{{ Form::input('email','email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'Correo Electronico')) }}	
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('telefono', 'Telefono', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-8">
					{{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control convencional', 'placeholder'=> 'Telefono')) }}	
				</div>
			</div>	
			<div class="form-group">
				{{ Form::label('mensaje', 'Escriba su Mensaje', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-8">
					{{ Form::textarea('mensaje', Input::old('mensaje'), array('class' => 'form-control', 'placeholder'=> 'Escriba su Mensaje')) }}	
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-10">
					{{ Form::submit('Enviar' , array('class'=> 'btn btn-primary')) }}
				</div>	
			</div>

		{{ Form::close() }}
	</div>
	<div class="ubicacion">
		<h2 class="titul">Nuestra ubicación en el mapa</h2>
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
