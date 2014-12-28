$(document).ready(other);

function other(){
	getCategoria();
	getArea();
}



function getCategoria(){	
	var datos = $('#valoreslicencia').val();
	var	cu = datos.split(',');

	for (var i = 0; i < cu.length; i++) {
		$("#licencia input[type='checkbox']").each(function(){
			if(cu[i] == $(this).val()){
				$(this).attr('checked', 'checked');				
			}
		});
	}	
}


function getArea(){
	var datos = $('#areas_interes').data('select');
	var	cu = datos.split(',');

	//console.log(cu);
	for (var i = 0; i < cu.length; i++) {
		$( "#areas_interes option" ).each(function(){
			if(cu[i] == $(this).val()){
				console.log($(this).val());
				$(this).attr('selected', 'selected');
			}
		});	
	}	
}

