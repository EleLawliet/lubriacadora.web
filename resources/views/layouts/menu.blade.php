<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fast-Duty</title>
     <link rel="shortcut icon" href="../imagenes/LUBRIAUTO.ico" />
    <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">   
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="../css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="../css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="../css/ace-skins.min.css" />
        <link rel="stylesheet" href="../css/ace-rtl.min.css" />


        {!!Html::script('../js/jquery-3.0.0.js') !!}
        {!!Html::script('../js/jquery-ui.min.js') !!}      
        {!!Html::script('../js/bootbox.min.js') !!}
        {!!Html::script('../js/jquery.js') !!}
       <!-- {!!Html::script('../js/jquery-2.1.4.min.js') !!}-->
        {!!Html::script('../js/jquery.BlockUI.js') !!}
        {!!Html::script('../js/jquery.js') !!}
        
        <script src="../js/ace-extra.min.js"></script>
        <script http="http://malsup.github.io/jquery.blockUI.js"></script>
        
        {!!Html::style('../css/dataTables/dataTables.bootstrap.min.css') !!}
        {!!Html::style('../css/dataTables/responsive.bootstrap.min.css') !!}


        {!!Html::style('../css/dataTables/jquery.dataTables.min.css') !!}
        {!!Html::style('../css/dataTables/buttons.dataTables.min.css') !!}


        <!-- JQUERY -->
        {!!Html::script('../js/dataTables/jquery.dataTables.min.js')!!}
        {!!Html::script('../js/dataTables/dataTables.bootstrap.min.js')!!}
        {!!Html::script('../js/dataTables/jquery.selectable-list.js')!!}
        {!!Html::script('../js/moment.min.js')!!}

        
    

    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="home" class="navbar-brand">
                        <small>
                           <img style="width: 36%;" src="../images/logo/Lubriauto.png" class="msg-photo" alt="Alex's Avatar" />
                       
                           
                        </small>
                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        

                        <li class="dropdown">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="../images/avatars/user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    {{ Auth::user()->name }} 
                                </span>

                               
                            </a>

                            
                        </li>
                        <li class="grey dropdown-modal">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"
                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off"></i>
                                <span class="badge badge-grey">cerrar</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>


        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>

            <div id="sidebar" class="sidebar responsive ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                            <i class="ace-icon fa fa-signal"></i>
                        </button>

                        <button class="btn btn-info">
                            <i class="ace-icon fa fa-pencil"></i>
                        </button>

                        <button class="btn btn-warning">
                            <i class="ace-icon fa fa-users"></i>
                        </button>

                        <button class="btn btn-danger">
                            <i class="ace-icon fa fa-cogs"></i>
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->

                <ul class="nav nav-list">
                   

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> Mantenimiento </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="tipoServicio">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Tipo Servicio
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="insumos">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Insumos
                                </a>

                                <b class="arrow"></b>
                            </li>

                            
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Referencial </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="cliente">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Registro de cliente
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="claseVehiculoServicio">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                     Registro Clases de Servicio
                                </a>

                                <b class="arrow"></b>
                            </li>

                         
                        </ul>
                    </li>

                   
                   

                   

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-tag"></i>
                            <span class="menu-text"> Transaccionales </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="serviciosCliente">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Servicios Vehiculo
                                </a>

                                <b class="arrow"></b>
                            </li>


                       


                           
                        </ul>
                    </li>

                      <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-file-pdf-o"></i>
                            <span class="menu-text"> Reporte </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="reporteServicios">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Reporte Servicios
                                </a>

                                <b class="arrow"></b>
                            </li>


                       


                           
                        </ul>
                    </li>
                 
                </ul><!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>

              @yield('content')
              @yield('scripts')
</div>


    <!-- Scripts -->
   
    <!--[if !IE]> -->
        <script src="../js/jquery-2.1.4.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='../js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="../js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->

        <!--[if lte IE 8]>
          <script src="assets/js/excanvas.min.js"></script>
        <![endif]-->
<!-- DataTables JavaScript -->
    

       
    
          
    <script src="../js/jquery.blockUI.js"></script>
    <script src="../js/jquery-ui.custom.min.js"></script>
    <script src="../js/jquery.ui.touch-punch.min.js"></script>
  <!--  <script src="../js/jquery.easypiechart.min.js"></script>
    <script src="../js/jquery.sparkline.index.min.js"></script>
    <script src="../js/jquery.flot.min.js"></script>
    <script src="../js/jquery.flot.pie.min.js"></script>
    <script src="../js/jquery.flot.resize.min.js"></script>-->
     
    <!-- ace scripts -->
    <script src="../js/ace-elements.min.js"></script>
    <script src="../js/ace.min.js"></script>
     
    <script src="../js/jquery-3.0.0.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/bootbox.min.js"></script>
   


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>


    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
     <script src="../js/dataTables/dataTables.responsive.min.js"></script>
    <script src="../js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>



    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../js/dataTables/jquery.selectable-list.js"></script>
      
    <script src="../js/dataTables/jquery.selectable-list.js"></script>
    
    
   
                        
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

        
                    
    
    

</body>
</html>
<script>
        
        function validarCampoLleno(valor, nombreCampo) {
            if (valor === "" || valor === "0" || valor === undefined || valor.length === 0) {
                $('#mensajes').addClass('alert alert-danger');
                $('#mensajes').removeClass('hide');
                var tips = $("#textoMensaje");
                tips.text("Error ! " + nombreCampo + " no puede estar vacío ");
                return false;
            } else {
                return true;
            }
        }
         function mensajePersonalizado(valor, nombreCampo) {
            if (valor === "" || valor === "0" || valor === undefined || valor.length === 0) {
                $('#mensajes').addClass('alert alert-danger');
                $('#mensajes').removeClass('hide');
                var tips = $("#textoMensaje");
                tips.text("Error ! " + nombreCampo + " ");
                return false;
            } else {
                return true;
            }
        }
</script>
