<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>tomay:store</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-toggle.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/checked.png')}}">

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>TSR</b>V</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Tomay::Store</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Navegación</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                            <small class="bg-green">Active</small>
                            <span class="hidden-xs">
                                @if(Auth::check())
                                    {{Auth::user()->fullname}}
                                @else
                                    Bienvenido a Tourme
                                @endif
                            </span>
                        </a>
                        <ul class="dropdown-menu animated-dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                @if(Auth::check())
                                    <img class="img-circle" src="{{asset('imagenes/usuarios/'.Auth::user()->avatar)}}">
                                @else
                                    <img class="img-circle img" src="{{asset('imagenes/tourme/travel.svg')}}">
                                @endif

                            </li>
                            <li class="user-body">
                                <p>
                                    @if(Auth::check())
                                        <i class="fa fa-user text text-yellow"></i>  {{Auth::user()->name}}
                                        | </i>{{Auth::user()->type}}
                                    @else
                                        Mejores Lugares | Vívelo
                                    @endif

                                    <small>
                                        @if(Auth::check())
                                            {{Auth::user()->fullname}}
                                        @else
                                            <h3>Puedes Crear tu Cuenta para Empezar un Mundo por Conocer</h3>
                                        @endif

                                    </small>
                                </p>
                            </li>
                            <li class="user-footer">
                                @if(Auth::check())
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>Cerrar Sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                @else
                                    <div class="col-lg-pull-0">
                                        <a href="{{ route('login') }}" class="text text-bold">
                                            <i class="fa fa-sign-in"></i>   Login
                                        </a>

                                    </div>
                                @endif
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"></li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-taxi text text-yellow"></i>
                        <span>Paquetes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/store/pqturistico"><i class="fa fa-circle-o"></i>Paquetes Turísticos</a></li>
                        <li><a href=""><i class="fa fa-circle-o"></i>Promociones</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-coffee"></i>
                        <span>Restaurantes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/store/restaurante"><i class="fa fa-circle-o"></i>Resturantes</a></li>
                        <li><a href=""><i class="fa fa-circle-o"></i>Promociones</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-hotel"></i>
                        <span>Hoteles</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/store/hotel"><i class="fa fa-circle-o"></i>Hoteles</a></li>
                        <li><a href=""><i class="fa fa-circle-o"></i>Promociones</a></li>
                    </ul>
                </li>
                @if(Auth::check())
                    @if(Auth::user()->type=='admin')
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-user"></i> <span>Usuarios y Accesos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/store/usuario"><i class="fa fa-circle-o"></i>Usuarios</a></li>

                            </ul>
                        </li>
                    @endif
                @endif
                <li>
                    <a href="#">
                        <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                        <small class="label pull-right bg-red">PDF</small>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                        <small class="label pull-right bg-yellow">PDF</small>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>


    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tomay Store Manager</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--Contenido-->
                                @yield('contenido')
                                <!--Fin Contenido-->
                                </div>
                            </div>

                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 <a href="">Tomay Dev</a>.</strong> Todos los Derechos Reservados.
</footer>


<!-- jQuery 2.1.4 -->
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-toggle.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/app.min.js')}}"></script>
<script>
    $(function() {
        $('#promos').change(function() {
            var promos=$('#promos').val();
            console.log("Promos: "+promos);
        })
    })
</script>
</body>