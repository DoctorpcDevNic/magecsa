@extends('templates.maintemplate')
@section('contenido')	
	<div class="nosotros">
		<div class="headnosotros">
			<img src="{{ asset('img/logo.png') }}" alt="" class="logonosotros computer">
			<h2 class="encabezado">¡Mas empleos, Mas servicios!</h2>
		</div>	
		{{-- quienes somos --}}
		<div class="quienes" id="QuinesSomos">
			<h3 class="titul">
				¿Quines Somos?<br>
				<span>Conoce acerca de nosotros</span>
			</h3>
			<img src="{{ asset('img/quienes.jpg') }}" alt="">
			<div class="texto">
			<p>MAGECSA, somos una empresa joven en Gestión de Talento Humano, con enfoque de brindar servicios de solución óptima a las áreas Administrativas y de Factor Humano con una base de talento en línea y plataformas de evaluación  automatizadas de manera íntegra, oportuna y confidencial.</p>
			<p>Contamos con profesionales calificados con amplia experiencia en todos los procesos y buenas prácticas de Recursos Humanos.</p>

			</div>
			<div class="flechaabajo computer">
				<img src="{{ asset('img/flechaabajo.png') }}" alt="">
			</div>
		</div>

		{{-- mision --}}
		<div class="mision" id="Mision">
			<h3 class="titul">
				Mision<br>
				<span>Como Lo vamos hacer</span>
			</h3>
			<img src="{{ asset('img/mision.jpg') }}" alt="">
			<div class="texto">
				<p>Brindar a nuestros clientes y candidatos  servicios de atención  personalizada orientada a satisfacer sus necesidades con procesos de  calidad y efectividad.</p>
			</div>
			<div class="fechaderecha computer">
				<img src="{{ asset('img/flechaderecha.png') }}" alt="">
			</div>
		</div>

		{{-- vision --}}
		<div class="vision" id="Vision">
			<h3 class="titul">
				Vision<br>
				<span>Lo que queremos hacer</span>
			</h3>
			<img src="{{ asset('img/vision.jpg') }}" alt="">
			<div class="texto">
				<p>Ser para nuestros clientes un aliado estratégico que le brinde soluciones integrales e innovadoras con valor agregado en sus procesos funcionales y de Capital Humano, minimizando sus costos con  alto nivel de profesionalismo, así mismo promover el desarrollo de nuestros candidatos a través de la superación constante para alcanzar la excelencia con ética y honestidad.</p>
			</div>
			<div class="fechaderecha computer">
				<img src="{{ asset('img/flechaderecha.png') }}" alt="">
			</div>
		</div>

		{{-- valores --}}
		<div class="valores" id="Valores">
			<h3 class="titul">
				Valores<br>
				<span>Lo que regirá nuestra cultura de servicios</span>
			</h3>
			<img src="{{ asset('img/valores.jpg') }}" alt="">
			<div class="texto">
				<ul>
					<li>Compromiso: Nuestros clientes y candidatos siempre serán lo primero.</li>
					<li>Ética y Honestidad: Nos comunicamos abierta y honestamente.   </li>
					<li>Respeto: Actuamos con integridad y respeto ante las personas.   </li>
					<li>Trabajo en equipo: Lograr resultados eficaces y eficientes.  </li>
					<li>Responsabilidad Social: Nos comprometemos con nuestra comunidad.</li>
				</ul>
			</div>
		</div>
	</div>
@stop