$(document).ready(main);

function main(){
	$('.mobil').addClass("hidden-sm hidden-md hidden-lg");
	$('.computer').addClass('hidden-xs');

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