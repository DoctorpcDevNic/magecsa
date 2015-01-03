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
		<h2 class="titul">Ociones elegidas</h2>
		<div class="form-group" id='puestos'>
			<input type="hidden" id="valorespuesto" value="{{$empresa->puestos}}">	
		    <div class="col-sm-4 col-xs-4">
		    	<input type="checkbox" name="puestos[]" value="Aduana|Agencia Aduaneras">Aduana|Agencia Aduaneras<br>
		    	<input type="checkbox" name="puestos[]" value="Agencia de Empleo|Reclutamiento">Agencia de Empleo|Reclutamiento<br>
		    </div>	
		     <div class="col-sm-4 col-xs-4">
		    	<input type="checkbox" name="puestos[]" value="Agricola|Ganadera">Agricola|Ganadera<br>
		    	<input type="checkbox" name="puestos[]" value="Agroindustrial">Agroindustrial<br>
		    </div>	
		     <div class="col-sm-4 col-xs-4">
		    	<input type="checkbox" name="puestos[]" value="Arquitectura|Diseño|Decoracion">Arquitectura|Diseño|Decoracion<br>
		    	<input type="checkbox" name="puestos[]" value="Automotriz">Automotriz<br>
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