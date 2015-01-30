<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador | MAGECSA</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/dataTables.bootstrap.css') }} 
   
    <!-- MetisMenu CSS -->
    {{ HTML::style('css/metisMenu.min.css') }}
   
    <!-- Custom CSS -->
    {{ HTML::style('css/sb-admin-2.css') }}
    {{ HTML::style('css/admin.css') }}
   
    <!-- Custom Fonts -->
    {{ HTML::style('css/font-awesome.min.css') }}
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::to('/') }}">MAGECSA</a>
                <a class="navbar-brand" href="#">{{ Auth::user()->username }}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                @if(Auth::user()->role_id == 0)
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <?php $mensajes = Mensaje::where('leido', 0)->take(5)->get(); ?>
                        @foreach($mensajes as $value)
                            <li>
                                <a href="{{ URL::to('administrador/mensajes/view/'. $value->id) }}">
                                    <div>
                                        <strong>{{$value->nombre}}</strong>
                                        <span class="pull-right text-muted">
                                            <em>{{ $value->created_at }}</em>
                                        </span>
                                    </div>
                                    <div>{{ substr($value->mensaje, 0, 80); }}...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                        @endforeach    
                        <li>
                            <a class="text-center" href="{{ URL::to('administrador/mensajes') }}">
                                <strong>Leer Todos los mensajes</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                @endif
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ URL::to('administrador/usuariosadmin/update/'. Auth::user()->id) }}"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('perfil/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        {{-- usuarios --}}
                        @if(Auth::user()->role_id == 0)
                        <li>
                            <a href="{{ URL::to('administrador') }}"><i class="fa fa-user fa-fw"></i> Usuarios</a>
                        </li>
                        {{-- candidatos --}}
                        <li>
                            <a href="{{ URL::to('administrador/candidatos') }}"><i class="fa  fa-users fa-fw"></i> Candidatos</a>

                        </li>
                        {{-- Empresas --}}
                        <li>
                            <a href="#"><i class="fa fa-briefcase fa-fw"></i> Empresas<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('administrador/empresas') }}">Ver Empresas</a>
                                </li>
                                <li>
                                    <a href="{{ URl::to('administrador/empresas/solicitud') }}">Empresas Interesadas</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        {{-- Vacantes --}}
                        <li>
                            <a href="{{ URL::to('administrador/vacantes') }}"><i class="fa fa-edit fa-fw"></i> Vacantes</a>
                        </li>
                        {{-- Slider --}}
                        <li>
                            <a href="{{ URL::to('administrador/slider') }}"><i class="fa fa-picture-o"></i> Slider</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
          @yield('contenido')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {{ HTML::script('js/vendor/jquery-1.11.1.min.js') }}      

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('js/bootstrap.min.js') }}

    <!-- Metis Menu Plugin JavaScript -->
    {{ HTML::script('js/metisMenu.min.js') }}
    {{ HTML::script('js/jquery.dataTables.min.js') }}
    

    <!-- Custom Theme JavaScript -->
    {{ HTML::script('js/sb-admin-2.js') }}
    {{ HTML::script('js/dataTables.bootstrap.js') }}

  

    @yield('js')

</body>

</html>