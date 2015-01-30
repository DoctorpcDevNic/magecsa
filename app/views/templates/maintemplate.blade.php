<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('titulo')</title> 
        <meta name="description" content="MAGECSA, somos una empresa joven en Gestión de Talento Humano, con enfoque de brindar servicios de solución óptima a las áreas Administrativas y de Factor Humano con una base de talento en línea y plataformas de evaluación automatizadas de manera íntegra, oportuna y confidencial. Contamos con profesionales calificados con amplia experiencia en todos los procesos y buenas prácticas de Recursos Humanos.">

		<meta name="keywords" content="MAGECSA, Mas empleos y servicios, empleos Nicaragua, Empleos, Vacantes, Curriculum, Profesionales, Trabajos, Reclutamiento, Evaluacion de personal, Outsourcing, Boaco, Carazo, Chinandega, Chontales, Estelí, Granada, Jinotega, Leon, Madriz, Managua, Masaya, Matagalpa, Nueva Segovia, RAAN, RAAS, Rio San Juan, Rivas"/>

		<!-- Twitter Card data -->
		<meta name="twitter:title" content="@yield('titulo')">
		<meta name="twitter:card" content="MAGECSA, somos una empresa joven en Gestión de Talento Humano, con enfoque de brindar servicios de solución óptima a las áreas Administrativas y de Factor Humano con una base de talento en línea y plataformas de evaluación automatizadas de manera íntegra, oportuna y confidencial. Contamos con profesionales calificados con amplia experiencia en todos los procesos y buenas prácticas de Recursos Humanos.">
		<meta name="twitter:site" content="MAGECSA">

		<meta name="twitter:description" content="MAGECSA, somos una empresa joven en Gestión de Talento Humano, con enfoque de brindar servicios de solución óptima a las áreas Administrativas y de Factor Humano con una base de talento en línea y plataformas de evaluación automatizadas de manera íntegra, oportuna y confidencial. Contamos con profesionales calificados con amplia experiencia en todos los procesos y buenas prácticas de Recursos Humanos.">
		<meta name="twitter:creator" content="MAGECSA">
		<meta name="twitter:image" content="{{ asset('img/logo.png') }}">

		<!-- Open Graph data -->
		<meta property="og:title" content="@yield('titulo')" />
		<meta property="og:url" content="{{Request::url()}}" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="{{ asset('img/logo.png') }}" />
		<meta property="og:description" content="MAGECSA, somos una empresa joven en Gestión de Talento Humano, con enfoque de brindar servicios de solución óptima a las áreas Administrativas y de Factor Humano con una base de talento en línea y plataformas de evaluación automatizadas de manera íntegra, oportuna y confidencial. Contamos con profesionales calificados con amplia experiencia en todos los procesos y buenas prácticas de Recursos Humanos." /> 
		<meta property="og:site_name" content="¡Más Empleos, Más Servicios!" />

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/jquery.smartmenus.bootstrap.css') }}	
		{{ HTML::style('css/bootstrap.vertical-tabs.min.css') }}	
		{{ HTML::style('css/dataTables.bootstrap.css') }} 

		{{ HTML::style('css/main.css') }}
		{{ HTML::style('css/animate.css') }}

		{{ HTML::style('css/camera.css') }}

		{{ HTML::style('css/slick.css') }}
		{{ HTML::style('css/monokai.min.css') }}
		{{ HTML::style('css/styleSlidePost.css') }}   

		
		{{ HTML::style('css/jquery.multiselect.css') }}  
		<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" />
			
    </head>
    <body>

      <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header>
	        <section class="slidermain">
	        <?php $slider = Slider::all(); ?>
				<div class="fluid_container">              
                	<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
                		@foreach($slider as $value)
	                    	<div data-src="{{ asset( 'img/upload/slider/'. $value->imagen )}}">
		                        <div class="camera_caption fadeFromBottom">{{ $value->descripcion }}</div>		                        
	                      	</div>
                      	@endforeach
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
		      					</a>
		      				</li>
		      				<li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
			                    	<i class="glyphicon glyphicon-user"></i><br>
			                    	Nosotros 
			                    </a>
			                    <ul class="dropdown-menu submenu" role="menu">
			                      <li><a href="{{ URL::to('Nosotros#QuinesSomos') }}">Quiénes Somos</a></li>
			                      <li><a href="{{ URL::to('Nosotros#Vision') }}">Visión</a></li> 
			                      <li><a href="{{ URL::to('Nosotros#Mision') }}">Misión</a></li> 			                     
			                      <li><a href="{{ URL::to('Nosotros#Valores') }}">Valores</a></li>                     
			                    </ul>
			                </li>
		      				<li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
			                    	<i class="glyphicon glyphicon-list-alt"></i><br>
			                    	Nuestros Servicios 
			                    </a>
			                    <ul class="dropdown-menu submenu" role="menu">
			                      <li><a href="{{ URL::to('Reclutamiento') }}">Busqueda y Selección de Personal </a></li>
			                      <li><a href="{{ URL::to('Evaluacion#evaluacion') }}">Evaluación de Personal </a></li>       
			                      <li><a href="{{ URL::to('Evaluacion#filtro') }}">Filtro de CVs </a></li>  
			                      <li><a href="{{ URL::to('Evaluacion#publicacion') }}">Publicación de Vacantes</a></li>                     
			                      <li class="dropdown">
				                  	<a href="#" class="dropdown-toggle" data-toggle="dropdown-menu"> Outsorcing </span></a>
				                    <ul class="dropdown-menu submenu" role="menu">
				                      <li><a href="{{ URL::to('Outsorcing#AdministracionPersonal') }}"> Administación de Personal</a></li>
				                      <li><a href="{{ URL::to('Outsorcing#AdministracionNomina') }}"> Administración de Nómina</a></li>
				                      <li><a href="{{ URL::to('Outsorcing#ServiciosAdministrativos') }}"> Servicio Administrativos </a></li>                              
				                    </ul>
					              </li>              
			                    </ul>
			                </li>
			                <li><a href="{{URL::to('Clientes')  }}">
			                	<i class="glyphicon glyphicon-briefcase"></i><br>
			                	Clientes 
			                </a></li>  
			                <li><a href="{{URL::to('Contactenos')  }}">
			                	<i class="glyphicon glyphicon-envelope"></i><br>
			                	Contactenos
			                </a></li> 
			                @if(Auth::check()) 
				                <li class="dropdown">
				                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
				                    	<i class="glyphicon glyphicon-list-alt"></i><br>
				                    	Perfil 
				                    </a>
				                    <ul class="dropdown-menu submenu" role="menu">
				                    	@if(Auth::check())
				                    		@if(Auth::user()->role_id == 2)
				                    			<li><a href="{{ URL::to('perfil/logout') }}">Cerrar Sesion</a></li> 
				                    		@elseif(Auth::user()->role_id == 0 )	
					                    		<li><a href="{{ URL::to('administrador') }}">Ver perfil</a></li>       
					                      		<li><a href="{{ URL::to('perfil/logout') }}">Cerrar Sesion</a></li> 
					                      	@elseif(Auth::user()->role_id == 1 )	
					                    		<li><a href="{{ URL::to('administrador/vacantes') }}">Ver perfil</a></li>       
					                      		<li><a href="{{ URL::to('perfil/logout') }}">Cerrar Sesion</a></li> 
					                      	@else
					                      		<li><a href="{{ URL::to('Perfil/'. Auth::user()->username) }}">Ver perfil</a></li>       
					                      		<li><a href="{{ URL::to('perfil/logout') }}">Cerrar Sesion</a></li> 
					                      	@endif	
				                    	@else
				                    		<li><a href="{{ URL::to('login') }}">Iniciar Sesion</a></li>
				                    	@endif        
				                    </ul>
				                </li>
			                @else
			                	<li class="activemenu">
			      					<a href="{{ URL::to('login') }}">
			      					<i class="glyphicon glyphicon-list-alt"></i><br>
			      						Iniciar Sesion
			      					</a>
			      				</li>
			                @endif
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
    		<p>Dirección: Plaza Bolonia Modulo L5, Teléfono: 2266-5793</p> 
    		<P>Todos Los Derechos Reservados</P>
    		<p class="hidden-md hidden-lg hidden-sm">Designed by <a href="">Doctor PC</a></p>
    		<ul class="hidden-xs">
		        <li><a href="{{ URL::to('Nosotros') }}">Quienes somos</a> <span>|</span></li>
		        <li><a href="{{ URL::to('Contactenos') }}">Contáctenos</a> <span>|</span></li>		       
		        <li><a href="{{ asset('document/PoliticasDePrivacidad.pdf') }}" target="new">Politicas de privacidad</a> <span>|</span></li>
		        <li><a href="">Idioma</a> <span>|</span></li>
		        <li>Designed by <a href="http://doctorpc.com.ni/" target="new">Doctor PC</a></li>
		      </ul>
    	</footer>


    	{{ HTML::script('js/vendor/jquery-1.11.1.min.js') }}        
      	{{ HTML::script('js/main.js') }}
      	{{ HTML::script('js/jquery.mask.min.js') }}
      	{{ HTML::script('js/wow.js') }}
      	

      	{{ HTML::script('js/bootstrap.min.js') }}
  		{{ HTML::script('js/jquery.smartmenus.min.js') }}
		{{ HTML::script('js/jquery.smartmenus.bootstrap.min.js') }}

		{{ HTML::script('js/jquery.dataTables.min.js') }}
		{{ HTML::script('js/dataTables.bootstrap.js') }}

		{{-- slider  Camera--}}	
		
		{{ HTML::script('js/jquery-migrate-1.2.1.min.js')}}

		{{ HTML::script('js/camera.js') }}
		{{ HTML::script('js/jquery.mobile.customized.min.js') }}
		{{ HTML::script('js/jquery.easing.1.3.js') }}

		{{-- End --}}

		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
		{{ HTML::script('js/jquery.multiselect.js') }}	
		
		

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
  	<script>
		new WOW().init();
	</script>
		
	@yield('js')	
    </body>
</html>        