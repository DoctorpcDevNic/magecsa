@extends('templates.maintemplate')
@section('titulo')
	Proceso de Reclutamiento - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')	
<div class="reclutamiento">
	<h3 class="titul wow bounceInDown"><img src="{{ asset('img/procesoreclutamiento.png') }}" alt="">Proceso de Reclutamiento</h3>
	<p class="subtitul">En MAGECSA le ofrecemos un servicio de Reclutamiento y Selección de Personal adaptado al candidato más calificado que cumpla con las expectativas del perfil del puesto. Durante el proceso de búsqueda lo asesoramos en la definición de perfiles, evaluaciones, entrevistas y selección de candidato idóneo, en los diferentes puestos: Gerenciales, Mandos Medios, Operativos o de Especialización.</p>

	<div class="etapas">
		<div class="etapa">
			<div class="triangulo computer"></div>
			<h3 class="tituletapa wow bounceInRight">Etapa 1: Búsqueda de Profesionales</h3>
			<div class="row">
				<div class="col-md-6 wow bounceInLeft"><img src="{{ asset('img/definicionperfil.png') }}" alt="">Definición del Perﬁl del Puesto</div>
				<div class="col-md-6 wow bounceInLeft"><img src="{{ asset('img/filtroapp.png') }}" alt="">Filtros de Aplicaciones</div>
			</div>
			<div class="row">
				<div class="col-md-6 wow bounceInRight"><img src="{{ asset('img/preselecion.png') }}" alt="">Publicación de la Vacante</div>
				<div class="col-md-6 wow bounceInRight"><img src="{{ asset('img/publicacion.png') }}" alt="">Pre selección de CVS</div>
			</div>
		</div>
		<div class="etapa">
			<div class="triangulo computer"></div>
			<h3 class="tituletapa wow bounceInLeft">Etapa 2: Evaluación y Selección de Profesionales</h3>
			<div class="row">
				<div class="col-md-6 wow bounceInDown"><img src="{{ asset('img/psicometrica.png') }}" alt="">Evaluación Psicométrica y Psicotécnicas</div>
				<div class="col-md-6 wow bounceInDown"><img src="{{ asset('img/seleccv.png') }}" alt="">Verificación de Referencias</div>
			</div>
			<div class="row">
				<div class="col-md-6 wow bounceInUp"><img src="{{ asset('img/reclutador.png') }}" alt="">Entrevistas Reclutador - Candidatos Preseleccionados</div>
				<div class="col-md-6 wow bounceInUp"><img src="{{ asset('img/datoscuenta.png') }}" alt="">Presentación de Candidatos Seleccionados</div>
			</div>
		</div>
		<div class="etapa">
			<div class="triangulo computer"></div>
			<h3 class="tituletapa wow bounceInRight">Etapa 3: Contratación</h3>
			<div class="row">
				<div class="col-md-6 wow fadeInUp"><img src="{{ asset('img/cvdescarga.png') }}" alt="">Informe Final de Resultados de Candidatos Seleccionados</div>
				<div class="col-md-6 wow fadeInUp"><img src="{{ asset('img/propuesta.png') }}" alt="">Propuesta Laboral a Candidato Seleccionado</div>
			</div>
			<div class="row">
				<div class="col-md-6 wow fadeInUp"><img src="{{ asset('img/entrevista.png') }}" alt="">Entrevistas Cliente-Candidatos Seleccionados</div>
				<div class="col-md-6 wow fadeInUp"><img src="{{ asset('img/contratacion.png') }}" alt="">Contratación de Candidato</div>
			</div>
		</div>
	</div>

</div>

@stop