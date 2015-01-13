@extends('templates.maintemplate')
@section('titulo')
	Outsorcing - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')	
<div class="reclutamiento evaluacion outsorcing">
	<div id="evaluacion" style="height:80px"></div>
	<h3 class="titul wow bounceInDown"><img src="{{ asset('img/outsorsing.png') }}" alt="">Outsorcing</h3>
	<p class="subtitul">MAGECSA como aliado estrategico le permite atraves de los servicios de Outsorcing que su empresa se centre en su core de negocio e invertir su tiempo en recursos especializados en sus competencias basicas, aquellas que les generan valor y les aseguran su posicionamiento en el mercado.</p>

	<div id="AdministracionPersonal" style="height:80px"></div>
	<h3 class="titul wow bounceInUp"><img src="{{ asset('img/admpersonal.png') }}" alt="">Administración de Personal</h3>
	<p class="subtitul">Mediante este servicio MAGECSA provee empleados de forma permanente o temporal a su empresa , asumiendo la relacion contractual empleado-patrono , asignando el recurso idoneo según los perfiles definido para cada puesto y su cultura empresarial, realizando el proceso de Reclutamiento y Selección completo.</p>

	<div id="AdministracionNomina" style="height:80px"></div>
	<h3 class="titul wow bounceInRight"><img src="{{ asset('img/admnomina.png') }}" alt="">Administración de Nómina</h3>
	<p class="subtitul">MAGECSA asume el proceso de elaboracion , contabilidad y pago de la nomina en nombre del cliente sin tener responsabilidad contractual ante las instituciones reguladoras , nos limitamos al proceso de la nomina.</p>

	<div id="ServiciosAdministrativos" style="height:80px"></div>
	<h3 class="titul wow bounceInLeft"><img src="{{ asset('img/servadmin.png') }}" alt="">Servicios Administrativos</h3>
	<p class="subtitul">En MAGECSA le ofrecemos los servicios profesionales de forma oportuna, responsable y eficiente con el objetivo de apoyar a su gestion Administrativa bajo nuestra responsabilidad en las areas de:</p>
	

	<div class="etapas wow lightSpeedIn">
		<div class="triangulo computer"></div>
		<div class="etapa etapaevaluacion">
			<img src="{{ asset('img/recp.png') }}" alt="" style="float:left">
			Recepción. Sabemos que la recepción es una de las partes más importantes de su empresa, para ello le ofrecemos el servicio de nuestro personal de recepción y atención telefónica el cual es cuidadosamente seleccionado atendiendo los distintos parámetros de formación y características personales.
		</div>
		<div class="etapa etapaevaluacion">
			<img src="{{ asset('img/concejeria.png') }}" alt=""  style="float:left">
			Conserjería. Brindamos un servicio de limpieza integral diseñado para cada cliente, según sus necesidades específicas que satisfaga los requerimientos de cada lugar y área, cumpliendo los estándares de calidad de su compañía y asumiendo por completo la responsabilidad del personal en su labor diaria.
		</div>
		<div class="etapa etapaevaluacion" style="margin-bottom: 2em">
			<img src="{{ asset('img/mensajeria.png') }}" alt=""  style="float:left">
			Mensajería . Entendemos sus necesidades y sabemos que no todo puede ser programado , por eso le ofrecemos mensajeros permanente o temporales para sus gestiones administrativas y comerciales liberándolo de toda carga social o laboral.
		</div>
	</div>

</div>	
@stop