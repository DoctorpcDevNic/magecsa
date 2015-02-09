@extends('templates.admintemplate')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ $vacante->titulo }}</h1>
    </div>               
</div>

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="addvacantes">
{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
	{{ Form::open(array('url' => 'administrador/vacante/update/' .$vacante->id , 'files' => true, 'class' => 'form-horizontal col-sm-offset-1')) }}
		<div class="form-group">
            {{ Form::label('titulo', 'Titulo de la vacante', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-6">
                {{ Form::text('titulo', Input::old('titulo') ? Input::old(): $vacante->titulo, array('class' => 'form-control', 'placeholder'=> 'Titulo de la vacante')) }}  
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('fecha', 'Fecha', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-6">
                {{ Form::input('date', 'fecha', Input::old('fecha') ? Input::old(): $vacante->fecha, array('class' => 'form-control')) }}   
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('departamento', 'Departamento', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-6">
                <select class="form-control" name="departamento" data-select="{{ $vacante->departamento }}" id="departamento">                    
                     <option value="Atlantico Norte (RAAN)">Atlantico Norte (RAAN)</option>              
                     <option value="Atlantico Sur (RAAS)">Atlantico Sur (RAAS)</option> 
                     <option value="Boaco">Boaco</option>               
                     <option value="Carazo">Carazo</option>             
                     <option value="Chinandega">Chinandega</option>             
                     <option value="Chontales">Chontales</option>               
                     <option value="Esteli">Esteli</option>             
                     <option value="Granada">Granada</option>               
                     <option value="Jinotega">Jinotega</option>             
                     <option value="Leon">Leon</option>                         
                     <option value="Madriz">Madriz</option>                         
                     <option value="Managua">Managua</option>                           
                     <option value="Masaya">Masaya</option>                         
                     <option value="Matagalpa">Matagalpa</option>                           
                     <option value="Nueva Segovia">Nueva Segovia</option>                           
                     <option value="Rio San Juan">Rio San Juan</option>                         
                     <option value="Rivas">Rivas</option>       
                </select>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('requisitos', 'Requisitos', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-6">
                {{ Form::textarea('requisitos', Input::old('requisitos') ? Input::old(): $vacante->requisitos, array('class' => 'form-control')) }}  
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('descripcion', 'Descripcion', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-6">
                {{ Form::textarea('descripcion', Input::old('descripcion') ? Input::old(): $vacante->descripcion, array('class' => 'form-control')) }}    
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('area_interes', 'Area de Interes', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-6">
                <select class="form-control" name="area_interes" data-select="{{ $vacante->area_interes }}" id="area_interes">
                    <option value="Mercadeo|Ventas">Mercadeo|Ventas</option>
                    <option value="Banca|Servicios Financieros">Banca|Servicios Financieros</option>                
                    <option value="Finanza|Contabilidad|Auditoria">Finanza|Contabilidad|Auditoria</option>  
                    <option value="Produccion|Ingenieria|Calidad">Produccion|Ingenieria|Calidad</option>    
                    <option value="Puestos Profesionales">Puestos Profesionales</option>    
                    <option value="Administracion">Administracion</option>  
                    <option value="Informatica|Internet">Informatica|Internet</option>  
                    <option value="Telecomunicaciones">Telecomunicaciones</option>  
                    <option value="Operaciones|Logistica">Operaciones|Logistica</option>    
                    <option value="Almacenamiento">Almacenamiento</option>  
                    <option value="Mantenimiento">Mantenimiento</option>    
                    <option value="Publicidad|Comunicaciones">Publicidad|Comunicaciones</option>    
                    <option value="Servicios">Servicios</option>    
                    <option value="Call Center">Call Center</option>    
                    <option value="Restaurantes">Restaurantes</option>  
                    <option value="Recursos Humanos">Recursos Humanos</option>  
                    <option value="Compras">Compras</option>
                    <option value="Salud">Salud</option>
                    <option value="Apoyo de Oficina">Apoyo de Oficina</option>      
                </select>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('logo', 'Logo', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-6">
                {{ Form::file('archivo') }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('enable', 'Habilitar', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-6">
               <select name="enable" class="form-control" data-select="{{ $vacante->enable }}" id="enable">
                    <option value="1">Habilitar</option>  
                    <option value="0">Deshabilitar</option>  
               </select> 
            </div>
        </div>
		<div class="form-group" style="margin-top: 2em">								
			{{ Form::submit('Modificar Vacante' , array('class'=> 'btn btn-primary regis', 'style' => 'padding:20px; font-size: 18px ')) }}				
		</div>
	{{ Form::close() }}
</div>
@if(Auth::user()->role_id == 0)
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Candidatos</h1>
    </div>               
</div>
<div>
	<?php 
		$vacantes = VacanteUsuario::where('vacante_id', $vacante->id)->get();

	 ?>
	<table class="table table-hover table-striped table-bordered candidatos">
		 <thead>
            <tr>
                <th>Nombre</th>
                <th>Área de interés</th>
               	<th>Genero</th>
               	<th>Vehículo</th>
                <th>Edad</th>
               	<th>Nivel Académico</th>
               	<th>Habilidad</th>
               	<th>Idioma</th>
            </tr>
            <tbody>
            	@foreach($vacantes as $value)
                    <?php 
                        $user = User::where('id', $value->usuario_id)->first();
                     ?>
                     @if($user->enable == 0)
                     <tr style="color:red">
                     @else
                     <tr>
                     @endif            		
            			<td><a href="{{ URL::to('administrador/Perfil/'. $user->username .'/vacante/'. $vacante->id . '' )}}" target="new">{{ $user->usuariodato->nombres }}</a> </td>

            			<td>
            				@foreach($user->usuarioexperiencia()->get() as $key)
            					{{ $key->area }},  
            				@endforeach
            			</td>
            			<td>{{ $user->usuariodato->genero }} </td>
            			<td>
            				@if($user->usuariodato->vehiculo == 1) no
            				@else si
            				@endif
            			</td>
                         <th>
                            <?php 
                                $fecha = UsuarioDato::where('usuario_id', $user->id)->first(); 
                                list($Y,$m,$d) = explode("-",$fecha->fecha_nacimiento);
                                $fecha = date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y ;
                             ?>
                             {{ $fecha }}
                        </th>
            			<td>
							@foreach($user->usuarioeducacion()->get() as $key)
            					{{ $key->nivel_academico }},  
            				@endforeach
            			</td>
            			<td>
            				{{ $user->usuariootro->habilidad1 }} ,
            				{{ $user->usuariootro->habilidad2 }} ,
            				{{ $user->usuariootro->habilidad3 }} 
            			</td>
            			<td>{{ $user->usuariootro->idioma }} </td>
            		</tr>
            	@endforeach	
            </tbody>
        </thead>
	</table>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Candidatos Ya Seleccionados</h1>
    </div>               
</div>
<div>
    <?php 
        $seleccionar = VacanteSeleccionar::where('vacante_id', $vacante->id)->get();

     ?>
    <table class="table table-hover table-striped table-bordered candidatos" >
         <thead>
            <tr>
                <th>Nombre</th>
                <th>Área de interés</th>
                <th>Genero</th>
                <th>Vehículo</th>
                <th>Edad</th>
                <th>Nivel Académico</th>
                <th>Habilidad</th>
                <th>Idioma</th>
            </tr>
            <tbody>
                @foreach($seleccionar as $value)
                    <?php 
                        $user = User::where('id', $value->usuario_id)->first();
                     ?>
                     @if($user->enable == 0)
                     <tr style="color:red">
                     @else
                     <tr>
                     @endif                 
                        <td><a href="{{ URL::to('administrador/Perfil/'. $user->username .'/vacante/'. $vacante->id . '' )}}" target="new">{{ $user->usuariodato->nombres }}</a> </td>

                        <td>
                            @foreach($user->usuarioexperiencia()->get() as $key)
                                {{ $key->area }},  
                            @endforeach
                        </td>
                        <td>{{ $user->usuariodato->genero }} </td>
                        <td>
                            @if($user->usuariodato->vehiculo == 1) no
                            @else si
                            @endif
                        </td>
                         <th>
                            <?php 
                                $fecha = UsuarioDato::where('usuario_id', $user->id)->first(); 
                                list($Y,$m,$d) = explode("-",$fecha->fecha_nacimiento);
                                $fecha = date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y ;
                             ?>
                             {{ $fecha }}
                        </th>
                        <td>
                            @foreach($user->usuarioeducacion()->get() as $key)
                                {{ $key->nivel_academico }},  
                            @endforeach
                        </td>
                        <td>
                            {{ $user->usuariootro->habilidad1 }} ,
                            {{ $user->usuariootro->habilidad2 }} ,
                            {{ $user->usuariootro->habilidad3 }} 
                        </td>
                        <td>{{ $user->usuariootro->idioma }} </td>
                    </tr>
                @endforeach 
            </tbody>
        </thead>
    </table>
</div>
@endif

@stop
@section('js')
<script type="text/javascript">	
    $('.candidatos').dataTable({
    	"language": {
            "url": "http://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Spanish.json"
        }
    });	
</script>
<script type="text/javascript">
    $("#area_interes option" ).each(function(){
        if($('#area_interes').data('select') == $(this).val()){
            $(this).attr('selected', 'selected');
        }
    });
     $("#departamento option" ).each(function(){
        if($('#departamento').data('select') == $(this).val()){
            $(this).attr('selected', 'selected');
        }
    });
     $("#enable option" ).each(function(){
        if($('#enable').data('select') == $(this).val()){
            $(this).attr('selected', 'selected');
        }
    });
</script>
@stop

