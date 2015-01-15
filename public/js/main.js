$(document).ready(main);

function main(){
	$('.mobil').addClass("hidden-sm hidden-md hidden-lg");
	$('.computer').addClass('hidden-xs');


	$('.convencional').mask('0000-0000');
	$('.celular').mask('0000-0000');	
	$('.cedula').mask('000-000000-0000S');	


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
	$( "#idioma option" ).each(function(){
		if($('#idioma').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});
	$( "#nivel_dominio1 option" ).each(function(){
		if($('#nivel_dominio1').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});
	$( "#nivel_dominio2 option" ).each(function(){
		if($('#nivel_dominio2').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});
	$( "#nivel_dominio3 option" ).each(function(){
		if($('#nivel_dominio3').data('select') == $(this).val()){
			$(this).attr('selected', 'selected');
		}
	});

	$('#cambiaravatar').click(function(){
		$('#ModalAvatar').modal('show'); 
	});

	$('#submitexpectativas').click(function(){
		$('#areasseleccionadas').val($('#pp').html());
	});

	tam();

}

function tam(){
	

	var fa = $("#fa").height();
	var ht = $("#ht").height();
	var di = $("#di").height();
	var ep = $("#ep").height();

	console.log($("#fa").height());
	console.log($("#ht").height());
	console.log($("#di").height());
	console.log($("#ep").height());

	var may = 0;

	if(fa >= ht && fa >= di && fa >= ep){
		may = fa;
	}else if(ht >= fa && ht >= di && ht >= ep){
		may = ht;
	}else if(di >= fa && di >= di && di >= ep){
		may = di;
	}else{
		may = ep;
	}
	console.log(may);

	$(".infomain .perfil .perfilpublico .infopf .row .info").css('height', may+15);
}

