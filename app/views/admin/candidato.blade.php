@extends('templates.admintemplate')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Candidatos</h1>
    </div>               
</div>
<div>
	<table class="table table-hover table-striped table-bordered" id="candidatos">
		 <thead>
            <tr>
                <th>Nombre</th>
                <th>Area de interes</th>
               	<th>Genero</th>
               	<th>Vehiculo</th>
                <th>Edad</th>
               	<th>Nivel Academico</th>
               	<th>Habilidad</th>
               	<th>Idioma</th>
            </tr>
            <tbody>
            	@foreach($user as $value)
                    @if($value->enable == 0)
                    <tr style="color:red">
                    @else
                    <tr>
                    @endif
            		
            			<td><a href="{{ URL::to('administrador/regalo/norwin/'. $value->username )}}" target="new">{{ $value->usuariodato->nombres }}</a> </td>

            			<td>
            				@foreach($value->usuarioexperiencia()->get() as $key)
            					{{ $key->area }},  
            				@endforeach
            			</td>
            			<td>{{ $value->usuariodato->genero }} </td>
            			<td>
            				@if($value->usuariodato->vehiculo == 1) no
            				@else si
            				@endif
            			</td>
                        <th>
                            <?php 
                                $fecha = UsuarioDato::where('usuario_id', $value->id)->first(); 
                                list($Y,$m,$d) = explode("-",$fecha->fecha_nacimiento);
                                $fecha = date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y ;
                             ?>
                             {{ $fecha }}
                        </th>
            			<td>
							@foreach($value->usuarioeducacion()->get() as $key)
            					{{ $key->nivel_academico }},  
            				@endforeach
            			</td>
            			<td>
            				{{ $value->usuariootro->habilidad1 }} ,
            				{{ $value->usuariootro->habilidad2 }} ,
            				{{ $value->usuariootro->habilidad3 }} 
            			</td>
            			<td>{{ $value->usuariootro->idioma }} </td>
            		</tr>
            	@endforeach	
            </tbody>
        </thead>
	</table>
</div>
@stop
@section('js')
<script type="text/javascript">	
    $('#candidatos').dataTable({
    	"language": {
            "url": "http://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Spanish.json"
        }
    });	
</script>
@stop