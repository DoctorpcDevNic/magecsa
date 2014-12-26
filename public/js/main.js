$(document).ready(main);

function main(){
	$('.mobil').addClass("hidden-sm hidden-md hidden-lg");
	$('.computer').addClass('hidden-xs');


	$('.convencional').mask('0000-0000');
	$('.celular').mask('0000-0000');	
	$('.cedula').mask('000-000000-000S');	


	$( "#estadocivil option" ).each(function(){
		if($('#estadocivil').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});

	$( "#genero option" ).each(function(){
		if($('#genero').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});

	$( "#departamento option" ).each(function(){
		if($('#departamento').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});

	$( "#tipo_identificacion option" ).each(function(){
		if($('#tipo_identificacion').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});

	$( "#vehiculo option" ).each(function(){
		if($('#vehiculo').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});

	$( "#disponible_viajar option" ).each(function(){
		if($('#disponible_viajar').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});

	$( "#interes_laboral option" ).each(function(){
		console.log($('#interes_laboral').data('select'));
		console.log($(this).val());

		if($('#interes_laboral').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});

	$( "#expectativa_salarial option" ).each(function(){
		if($('#expectativa_salarial').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});
	$( "#ubicacion_laboral option" ).each(function(){
		if($('#ubicacion_laboral').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});
	$( "#areas_interes option" ).each(function(){
		if($('#areas_interes').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});
	$( "#puesto_interes option" ).each(function(){
		if($('#puesto_interes').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});
	$( "#horario option" ).each(function(){
		if($('#horario').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});

	$( ".actividad_empresa option" ).each(function(){
		if($('.actividad_empresa').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});

	$( ".area option" ).each(function(){
		if($('.area').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});
	$( ".nivel_academico option" ).each(function(){
		if($('.nivel_academico').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});
	$( ".instituto option" ).each(function(){
		if($('.instituto').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});


	seleccion();


	
}

function seleccion(){
	var a = [];


	$('#selec').click(function(){
		if(a.length == 3){
			$("#selec").attr('disabled' , 'disabled');
		}else{
			$("#selec").removeAttr('disabled');	
		}
	})

	$('#selec').change(function(){
	
		a.push($(this).val());
		
		$('.infouser').append("<div class='alert alert-warning alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button><strong>"+ $(this).val() +"</strong></div>");

		//console.log(a);
		//console.log(a.length);

		//$('.infouser').html(a);
		//alert($(this).val());
	});
}