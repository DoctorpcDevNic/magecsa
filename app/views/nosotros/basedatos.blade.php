@extends('templates.maintemplate')
@section('titulo')
	Base de Datos - Mas Empleos Y Servicios | MAGECSA
@stop
@section('contenido')
<div class="reclutamiento">
	<p class="subtitul">Bienvenido a la base de datos más amplia, fácil y eficiente con potencial 100 % pinolero, donde podrá hacer un filtro por área para obtener a su candidato deseado, de igual manera le recordamos nuestros servicios directos de reclutamiento, selección y evaluación de personal. Gracias por unirte a esta gran familia.</p>
	<p class="subtitul">Para mayor información, <a href="{{ URL::to('Contactenos') }}" style="text-decoration:underline">Contáctenos</a></p>
</div>

@stop