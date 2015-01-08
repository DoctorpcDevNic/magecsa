@extends('templates.admintemplate')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Empresas {{ $empresa->nombre }}</h1>
    </div>               
</div>

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="opcion">
	{{ Form::open(array('url' => 'administrador/empresas/updateadmin/' .  $empresa->id, 'class' => 'form-horizontal')) }}
		<h2 class="titul">Opciones elegidas</h2>
		<div class="form-group" id='puestos'>
			<input type="hidden" id="valorespuesto" value="{{$empresa->puestos}}">	
		    <div class="col-sm-4 col-xs-4">
		    	<input type="checkbox" name="puestos[]" value="Mercadeo|Ventas">Mercadeo|Ventas<br>
		    	<input type="checkbox" name="puestos[]" value="Banca|Servicios Financieros">Banca|Servicios Financieros<br>
		    	<input type="checkbox" name="puestos[]" value="Finanza|Contabilidad|Auditoria">Finanza|Contabilidad|Auditoria<br>
		    	<input type="checkbox" name="puestos[]" value="Produccion|Ingenieria|Calidad">Produccion|Ingenieria|Calidad<br>
		    	<input type="checkbox" name="puestos[]" value="Puestos Profesionales">Puestos Profesionales<br>
		    	<input type="checkbox" name="puestos[]" value="Administracion">Administracion<br>
		    	<input type="checkbox" name="puestos[]" value="Informatica|Internet">Informatica|Internet<br>
		    </div>	
		     <div class="col-sm-4 col-xs-4">		    	
		    	<input type="checkbox" name="puestos[]" value="Telecomunicaciones">Telecomunicaciones<br>
		    	<input type="checkbox" name="puestos[]" value="Operaciones|Logistica">Operaciones|Logistica<br>
		    	<input type="checkbox" name="puestos[]" value="Almacenamiento">Almacenamiento<br>
		    	<input type="checkbox" name="puestos[]" value="Mantenimiento">Mantenimiento<br>
		    	<input type="checkbox" name="puestos[]" value="Publicidad|Comunicaciones">Publicidad|Comunicaciones<br>
		    	<input type="checkbox" name="puestos[]" value="Servicios">Servicios<br>
		    </div>	
		     <div class="col-sm-4 col-xs-4">		    	
		    	<input type="checkbox" name="puestos[]" value="Call Center">Call Center<br>
		    	<input type="checkbox" name="puestos[]" value="Restaurantes">Restaurantes<br>
		    	<input type="checkbox" name="puestos[]" value="Recursos Humanos">Recursos Humanos<br>
		    	<input type="checkbox" name="puestos[]" value="Compras">Compras<br>
		    	<input type="checkbox" name="puestos[]" value="Salud">Salud<br>
		    	<input type="checkbox" name="puestos[]" value="Apoyo de Oficina">Apoyo de Oficina<br>
		    </div>	
		</div>	
		<div class="form-group">								
			{{ Form::submit('Activar empresa y agregar puestos' , array('class'=> 'btn btn-primary col-sm-offset-4')) }}				
		</div>
	{{ Form::close() }}	
</div>
@stop

@section('js')
<script type="text/javascript">
	var datos = $('#valorespuesto').val();
	var	cu = datos.split(',');

	for (var i = 0; i < cu.length; i++) {
		$("#puestos input[type='checkbox']").each(function(){
			if(cu[i] == $(this).val()){
				$(this).attr('checked', 'checked');				
			}
		});
	}	
</script>
@stop