<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('titulo')</title>   
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/jquery.smartmenus.bootstrap.css') }}		

		{{ HTML::style('css/main.css') }}

		{{ HTML::style('css/camera.css') }}

		{{ HTML::style('css/slick.css') }}
		{{ HTML::style('css/monokai.min.css') }}
		{{ HTML::style('css/styleSlidePost.css') }}     
    </head>
    <body>

      <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header>
	        <section class="slidermain">
				<div class="fluid_container">              
                	<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
                    	<div data-src="{{ asset( 'img/emprendedores.jpg' )}}">
	                        <div class="camera_caption fadeFromBottom">"Tu oportunidad de crecer profesionalmente es hoy, bienvenido a nuestro equipo"</div>		                        
                      	</div>
                      	<div data-src="{{ asset( 'img/emprendedores.jpg') }}">
	                       <div class="camera_caption fadeFromBottom" >"Tu oportunidad de crecer profesionalmente es hoy, bienvenido a nuestro equipo"</div>		                        
                      	</div>
                      	<div data-src="{{ asset( 'img/emprendedores.jpg') }}">
                      		<div class="camera_caption fadeFromBottom" >"Tu oportunidad de crecer profesionalmente es hoy, bienvenido a nuestro equipo"</div>		                        
                      	</div>
                  	</div>
            	</div>	
            	<div class="clear"></div>       	
	        </section>

	        <div class="logo">
	        	<img src="{{ asset('img/logo.png') }}">
	        </div>

	        <nav class="menumain navbar navbar-default" role="navigation">
      			<div class="container-fluid">
	      		 	<!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>			      
				    </div>
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      			<ul class="nav navbar-nav" style="width:100%">
		      				<li class="activemenu">
		      					<a href="{{ URL::to('/') }}">
		      					<i class="glyphicon glyphicon-home"></i><br>
		      						Inicio
		      					</a></li>
		      				<li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
			                    	<i class="glyphicon glyphicon-user"></i><br>
			                    	Nosotros 
			                    </a>
			                    <ul class="dropdown-menu submenu" role="menu">
			                      <li><a href="{{ URL::to('Nosotros#QuinesSomos') }}">Quienes Somos</a></li>
			                      <li><a href="{{ URL::to('Nosotros#Vision') }}">Visión</a></li>       
			                      <li><a href="{{ URL::to('Nosotros#Mision') }}">Mision</a></li>                     
			                      <li><a href="{{ URL::to('Nosotros#Valores') }}">Valores</a></li>                     
			                    </ul>
			                </li>
		      				<li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
			                    	<i class="glyphicon glyphicon-list-alt"></i><br>
			                    	Nuestros Servicios 
			                    </a>
			                    <ul class="dropdown-menu submenu" role="menu" style="width:102% !important">
			                      <li><a href="{{ URL::to('/') }}">Reclutamiento y Selección de personal </a></li>
			                      <li><a href="{{ URL::to('/') }}">Evaluacion de Personal </a></li>       
			                      <li><a href="{{ URL::to('/') }}">Capacitacion </a></li>                     
			                      <li class="dropdown">
				                  	<a href="#" class="dropdown-toggle" data-toggle="dropdown-menu"> Outsorcing </span></a>
				                    <ul class="dropdown-menu submenu" role="menu">
				                      <li><a href="{{ URL::to('/') }}"> Administacion de Personal y Nomina </a></li>
				                      <li><a href="{{ URL::to('/') }}"> Servicios de Limpieza </a></li>       
				                      <li><a href="{{ URL::to('/') }}"> Digitalizacion de datos </a></li>                                     
				                    </ul>
					              </li> 
			                      <li><a href="{{ URL::to('/') }}">Bolsa Inmobiliaria</a></li>                     
			                    </ul>
			                </li>
			                <li><a href="{{URL::to('/')  }}">
			                	<i class="glyphicon glyphicon-briefcase"></i><br>
			                	Clientes 
			                </a></li>  
			                <li><a href="{{URL::to('Contactenos')  }}">
			                	<i class="glyphicon glyphicon-envelope"></i><br>
			                	Contactenos 
			                </a></li>  
		      			</ul>
		      		</div>
		      	</div>		
      		</nav>
      		<!--end menu -->
    	</header>

    	<section class="infomain container">
    		@yield('contenido')	
    	</section>

    	<footer>
    		<div class="social">
    			<a href=""><img src="{{ asset('img/facebooklogo.png') }}" alt=""></a>
    			<a href=""><img src="{{ asset('img/twiter.png') }}" alt=""></a>
    			<a href=""><img src="{{ asset('img/linkeding.png') }}" alt=""></a>
    		</div>
    		<p>Mas Empleos Y Servicios &copy; 2014 MAGECSA</p>
    		<P>Todos Los Derechos Reservados</P>    		
    		<p class="hidden-md hidden-lg hidden-sm">Designed by <a href="">Doctor PC</a></p>
    		<ul class="hidden-xs">
		        <li><a href="">Quienes somos</a> <span>|</span></li>
		        <li><a href="">Contáctenos</a> <span>|</span></li>		       
		        <li><a href="">Términos de Uso</a> <span>|</span></li>
		        <li><a href="">Idioma</a> <span>|</span></li>
		        <li>Designed by <a href="http://doctorpc.com.ni/" target="new">Doctor PC</a></li>
		      </ul>
    	</footer>


    	{{ HTML::script('js/vendor/jquery-1.11.1.min.js') }}        
      	{{ HTML::script('js/main.js') }}

      	{{ HTML::script('js/bootstrap.min.js') }}
  		{{ HTML::script('js/jquery.smartmenus.min.js') }}
		{{ HTML::script('js/jquery.smartmenus.bootstrap.min.js') }}


		{{-- slider  Camera--}}	
		
		{{ HTML::script('js/jquery-migrate-1.2.1.min.js')}}

		{{ HTML::script('js/camera.js') }}
		{{ HTML::script('js/jquery.mobile.customized.min.js') }}
		{{ HTML::script('js/jquery.easing.1.3.js') }}

		{{-- End --}}

		

	<script>
	    jQuery(function(){

		    if($(window).width() < 760){
		    	 jQuery('#camera_wrap_1').camera({        
			        height: '30%',   
			        pagination: false,       
			      });
		    }else if($(window).width() < 1024){
		    	jQuery('#camera_wrap_1').camera({        
			        height: '45%',   
			        pagination: false,       
			      });
		    }else{
		    	jQuery('#camera_wrap_1').camera({        
			        height: '39%',   
			        pagination: false,       
			      });
		    }  
	    });
  	</script>
		
	@yield('js')	
    </body>
</html>        