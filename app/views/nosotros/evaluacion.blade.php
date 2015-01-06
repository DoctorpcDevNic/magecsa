@extends('templates.maintemplate')
@section('titulo')
	Evaluacion de personal - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')
<div class="reclutamiento evaluacion">
	<h3 class="titul wow bounceInDown" id="evaluacion"><img src="{{ asset('img/evaluacion.png') }}" alt="">Evaluación de Personal</h3>
	<p class="subtitul">MAGECSA le ofrece a su empresa el servicio de Evaluación de Personal a través de una herramienta de autoevaluación que nos permite identificar los rasgos del Comportamiento, Personalidad e Inteligencia del individuo para desempeñar el puesto.</p>

	<div class="etapas">
		<div class="row">
			<div class="etapa col-md-6" style=" height: 350px">
				<div class="triangulo computer"></div>
				<h3 class="tituletapa wow bounceInRight">Etapa1: Evaluación de Profesionales</h3>
				<div class="col-md-12 wow fadeInUp"><img src="{{ asset('img/deficinion.png') }}" alt="">Deﬁnición de Evaluaciones a aplicar según Perﬁl y nivel del Puesto</div>
				<div class="col-md-12 wow fadeInUp"><img src="{{ asset('img/envioonline.png') }}" alt="">Envío de Evaluaciones Online a Candidato</div>
				<div class="col-md-12 wow fadeInUp"><img src="{{ asset('img/confirmacion.png') }}" alt="">Se conﬁrma con el candidato si recibió las Evaluaciones</div>
			</div>
			<div class="etapa col-md-6">
				<div class="triangulo computer"></div>
				<h3 class="tituletapa wow bounceInLeft">Etapa2: Resultados de Evaluaciones</h3>
				<div class="col-md-12 wow fadeInDown"><img src="{{ asset('img/seleccv.png') }}" alt="">Revisión de Resultados</div>
				<div class="col-md-12 wow fadeInDown"><img src="{{ asset('img/presentacionreporte.png') }}" alt="">Presentación de Reportes Individuales de cada test psicométrico aplicado.</div>
				<div class="col-md-12 wow fadeInDown"><img src="{{ asset('img/prestresumen.png') }}" alt="">Presentación de Resumen Ejecutivo de la adecuación de la persona al puesto</div>
			</div>
		</div>	
	</div>

	<h3 class="titul wow bounceInDown" style="margin-top: 3em" id="filtro"><img src="{{ asset('img/filtrocv.png') }}" alt="">Filtro de CVs</h3>
	<div class="row">
		<div class="col-md-6">
			<p class="subtitul wow bounceInRight">MAGECSA le ofrece a su empresa el servicio de Evaluación de Personal a través de una herramienta de autoevaluación que nos permite identificar los rasgos del Comportamiento, Personalidad e Inteligencia del individuo para desempeñar el puesto.</p>	
		</div>
		<div class="col-md-6">
			<img src="{{ asset('img/oportunidad.png') }}" alt="" class="img-responsive">
		</div>
	</div>

	<h3 class="titul wow bounceInDown" id="publicacion"><img src="{{ asset('img/publivacante.png') }}" alt="">Publicación de Vacantes</h3>
	<p class="subtitul wow bounceInUp">Nuestro servicio de Publicacion de Vacante le permite Publicar sus ofertas en <a href="{{ URL::to('/')}}" style="text-decoration: underline">www.masempleosyservicios.com.ni</a> con los siguientes beneficios:</p>
	<div class="etapas wow lightSpeedIn">
		<div class="triangulo computer"></div>
		<div class="etapa etapaevaluacion">
			<img src="{{ asset('img/calendario.png') }}" alt="">
			Publicar vacantes con espacio ilimitado de texto para publicar su Perﬁl del Puesto, hasta por 30 dias
		</div>
		<div class="etapa etapaevaluacion">
			<img src="{{ asset('img/pc.png') }}" alt="">
			Disponer de formato único para recepción de aplicaciones, el cual facilita una rápida comparación de ﬁnalistas
		</div>
		<div class="etapa etapaevaluacion" style="margin-bottom: 2em">
			<img src="{{ asset('img/candadollave.png') }}" alt="">
			Publicación Conﬁdencial, usted decide anunciar o no en la Vacante el nombre de su Empresa
		</div>
	</div>

	
</div>
@stop