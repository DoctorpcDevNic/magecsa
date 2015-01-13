@extends('templates.admintemplate')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Mensajes llegado de Contacto</h1>
    </div>               
</div>

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div style="text-align:center; font-size:18px">
	<p>Nombre: <span>{{ $mensaje->nombre }}</span></p>
	<p>Razon: <span>{{ $mensaje->razon }}</span></p>
	<p>Email: <span>{{ $mensaje->email }}</span></p>
	<p>Telefono: <span>{{ $mensaje->Telefono }}</span></p>
	<p>Mensaje: <span>{{ $mensaje->mensaje }}</span></p>
</div>
@stop