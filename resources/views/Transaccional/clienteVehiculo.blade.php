
@extends('layouts.menu')

@section('content')

<div class="container">

  <div class="page-header">
              <h1>
                Cliente Vehiculo
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  Transaccional 
                </small>
              </h1>
            </div><!-- /.page-header -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="">
               
                <div class="">
                    

               <br>
              <form class="form-horizontal" id="sample-form" method="POST" enctype="multipart/form-data"  action="{{url('/guardarTipoServicio')}}" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         @if(Session::has('message'))
                                <div id="mensajesController" class="alert alert-success" >
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                    <p> {{Session::get('message')}} </p>
                                </div>
                         @endif
                         @if(Session::has('message_i'))
                                <div id="mensajesController" class="alert alert-info" >
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                    <p> {{Session::get('message_i')}} </p>
                                </div>
                         @endif
                       
                          @if (count($errors) > 0)
                            <div id="mensajesController" class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div id="mensajes" name="mensajes" class="hide">
                                    
                                     <label id="textoMensaje" name="textoMensaje"></label>
                        </div>
                  
         <div class="row"> 
          <div class="col-sm-10">     
               

              <div class="form-group ">
                    <span class="block input-icon input-icon-right">
                    <label  for=""  class="col-xs-5 col-sm-2 control-label no-padding-right">N.Solicitud</label>
                    
                    <div class="col-xs-1 col-sm-3">            
                          <input name="servicios_ciente_id" type="number" id="servicios_ciente_id" class="width-100" />   
                     </div>
                       <div class="col-xs-2 col-sm-1">  
                         <a class="btn_buscarSolicitud"  href="#" data-toggle="modal"  data-placement="left" title= "Consulta Trabajador">
                                    <i class="fa fa-search icon-paciente"></i>
                          </a>
                      </div>  
                        
              </div>
              <div class="form-group ">
                      <label for="" class="col-xs-1 col-sm-2 control-label no-padding-right">Cedula</label>
                      
                        <div class="col-xs-5 col-sm-3">
                          <span class="block input-icon input-icon-right">
                            <input name="cedula" type="number" id="cedula" class="width-100" />
                            <a></a>
                          </span>
                        </div>
                       <div class="col-xs-2 col-sm-1">  
                         <a class="btn_buscar"  href="#" data-toggle="modal"  data-placement="left" title= "Consulta Trabajador">
                                    <i class="fa fa-search icon-paciente"></i>
                          </a>
                      </div>
                      <div class="col-xs-5 col-sm-3"> 
                          <input name="nombre" type="text" disabled="true" placeholder="Nombre" id="nombre" class="width-100" />
                          <input name="cliente_id" type="hidden"  id="cliente_id" class="width-100" />
                          <input name="det_servicios_cliente_id" type="hidden"  id="det_servicios_cliente_id" class="width-100" />

                          
                      <input name="cantidad_cambio" type="hidden"  id="cantidad_cambio" class="width-100" />

                      </div>
                      <div class="col-xs-5 col-sm-3">
                        <input name="apellido" placeholder="Apellido" disabled="true" type="text" id="apellido" class="width-100" />
                      </div>    
              </div>

              <div class="form-group ">
                    <span class="block input-icon input-icon-right">
                    <label  for=""  class="col-xs-5 col-sm-2 control-label no-padding-right">vehículos</label>
                    <div class="col-xs-5 col-sm-7">
                         <div id="cmb_vehiculos"></div>
                    </div> 
                    <div class="col-xs-1 col-sm-3">            
                      <select id="insumos_id" name="insumos_id" class="form-control" data-placeholder="Click to Choose...">

                          <option value="">Insumos...</option>
                           @foreach($lstInsumos as $item) 
                                        <option  value="{{$item->estado_id}}">{{$item->nombre}}</option> 
                           @endforeach
                        </select>          
                     </div>   
                        
              </div>

              <div class="form-group ">

                     <label for="" class="col-xs-12 col-sm-2 control-label no-padding-right">Km Inicio</label>

                    <div class="col-xs-12 col-sm-3">
                      <span class="block input-icon input-icon-right">
                        <input name="Kilometraje_inicio" title="Kilometraje inicio"  type="text" id="Kilometraje_inicio" class="width-100" />
                       
                      </span>
                    </div>

                     
                    <div class="col-xs-1 col-sm-6">
                      <span class="block input-icon input-icon-right">
                        
                        <div id="cmbServicio"></div>
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>

                     
              </div>
               <div class="form-group ">
                      <label for="" class="col-xs-12 col-sm-2 control-label no-padding-right">Km Sustitución</label>
                    <div class="col-xs-12 col-sm-3">
                      <span class="block input-icon input-icon-right">
                        <input name="kilometraje_sustitucion" placeholder="kilometraje_sustitucion" type="text" id="kilometraje_sustitucion" class="width-100" />
                       
                      </span>
                    </div>
                    <label for="" class="col-xs-2 col-sm-3 control-label no-padding-right">Fecha Sustitución</label>
                    <div class="col-xs-12 col-sm-3">
                        
                      <span class="block input-icon input-icon-right">
                        <input name="fecha_sustitucion" type="date" id="fecha_sustitucion" value="" class="width-100" />
                       
                      </span>
                    </div>
                         
                         <a id="btn_agregar" class="col-md-1" type="button" data-toggle="tooltip" data-placement="left" title="Agrega vehiculo">
                                <i class="fa fa-plus-circle fa-2x"></i>
                    </a>
              </div>

              <hr align="left" noshade="noshade" size="2" width="120%" />
              <div class="form-group ">
                   <div class="col-xs-3 col-md-8">  
                   </div>
                    <div class="col-xs-3 col-md-2">  
                          <button id="btn_editar" class="btn btn-primary " type="button"  />  Guardar</button> 

                    </div>
                                        <div class="col-xs-3 col-md-2">  
                                                                    <button class ="btn btn-primary" id="btn_limpiar" type="button"  > Limpiar </button> 

                                        </div>

              </div>
            </div>  
      </div>       
                    <div class="form-group "> 
                           <div class="panel-heading">Listado de Servicios</div>
                               <div id="tbl_vehiculo"></div> 
                                
                    </div> 


                  </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function limpiarMensajes(){
         $('#mensajes').removeClass('alert alert-danger');
         $('#mensajes').removeClass('alert alert-success');
         $('#mensajes').removeClass('alert alert-info');
         $('#mensajes').addClass('hide');
         $('#mensajesController').removeClass('alert alert-danger');
         $('#mensajesController').removeClass('alert alert-success');
         $('#mensajesController').removeClass('alert alert-info');
         $('#mensajesController').addClass('hide');    
    }

     function consultarDias(){

         
        var Kilometraje_inicio=$("#Kilometraje_inicio").val();
        var clase_vehiculo_servicio_id=$("#clase_vehiculo_servicio_id").val();
        var vehiculo_id=$("#vehiculo_id").val();
        var cliente_id=$("#cliente_id").val();
        var bValid=false;

         $('#fecha_sustitucion').val("");
         $('#kilometraje_sustitucion').val("");
         $("#cantidad_cambio").val("");
        //bValid = bValid && validarCampoLleno(Kilometraje_inicio, 'Km Inicio');
      
        if(Kilometraje_inicio === "" || Kilometraje_inicio === "0" || Kilometraje_inicio === undefined || Kilometraje_inicio.length === 0) {
                $('#mensajes').addClass('alert alert-danger');
                $('#mensajes').removeClass('hide');
                var tips = $("#textoMensaje");
                tips.text("Error ! Km Inicio  no puede estar vacío ");
                bValid=false;
            } else {
                bValid=true;
            }


      if (bValid == true){


           $.ajax({
                    url: '{{ url('/calculaServicos') }}',
                    type: 'post',
                    data: {'Kilometraje_inicio': Kilometraje_inicio,'clase_vehiculo_servicio_id':clase_vehiculo_servicio_id,
                    'vehiculo_id':vehiculo_id,'cliente_id':cliente_id},
                     beforeSend: function() {
                        //$.blockUI({ message: '<h4><img src="../imagenes/gif/progress.gif" /></br> PROCESANDO... Espere un momento porfavor </h4>' });
                      },
                      error : function(jqXHR, textStatus, errorThrown) {
                            var gnrMensaje =$("#gnrMensaje");
                            if(jqXHR.status == '401'){
                                gnrMensaje.text("Su sesión ha caducado, porfavor de click en Salir y vuelva a Ingresar."); 
                                $('#gnrError').modal('show');
                            }else{
                               alert('Disculpe, existió un problema');
                            }      
                      },
                      success: function(data) {
                        
                       

                            if(data.fecha_sustitucion!=null){
                                 var fechaSustitucion=data.fecha_sustitucion.date;
                                 var fechaEjemplo = moment(data.fecha_sustitucion.date, 'YYYY-MM-DD');
                                  $('#fecha_sustitucion').val(moment(fechaEjemplo).format('YYYY-MM-DD'));

                                  limpiarMensajes();
                            }
                            if(data.kilometraje_sustitucion!=null){
                                  $('#kilometraje_sustitucion').val(data.kilometraje_sustitucion);
                                  limpiarMensajes();

                            }
                            if(data.cantidad_cambio!=null){
                                  $("#cantidad_cambio").val(data.cantidad_cambio);
                                  limpiarMensajes();
                            }
                            

                            if(data.mensaje!=null){
                             
                               
                                  $('#mensajes').addClass('alert alert-danger');
                                  $('#mensajes').removeClass('hide');
                                  var tips = $("#textoMensaje");
                                  tips.text("Error ! "+data.mensaje+"");
                                 
                                  $("#clase_vehiculo_servicio_id").val("");
                            }

                            // mensajePersonalizado("", 'No se encontrarón registros con cedula N.');

                     },
                     complete: function() {
                       
                    }
                           
                   });

           }

        
     }

      function consultarcedulas(){

               var vehiculo_id= $("#vehiculo_id").val();
               if(vehiculo_id!=""){

                    $.ajax({
                         url: '{{ url('/buscarserviciosPorClaseVehiculo') }}',
                         type: 'post',
                         data: {'vehiculo_id': vehiculo_id},
                         beforeSend: function() {
                            //$.blockUI({ message: '<h4><img src="../imagenes/gif/progress.gif" /></br> PROCESANDO... Espere un momento porfavor </h4>' });
                          },
                         error : function(jqXHR, textStatus, errorThrown) {
                            var gnrMensaje =$("#gnrMensaje");
                            if(jqXHR.status == '401'){
                                gnrMensaje.text("Su sesión ha caducado, porfavor de click en Salir y vuelva a Ingresar."); 
                                $('#gnrError').modal('show');
                            }else{
                               alert('Disculpe, existió un problema');
                            }     
                        },
                         success: function(data) {


                        // var cadena = JSON.stringify(data);
                         var materias= verTipoArchivo(data);
                                var message='<select id="clase_vehiculo_servicio_id"  onclick="consultarDias();" name="clase_vehiculo_servicio_id"  class="form-control">'+materias+
                                            '</select>';
                               $("#cmbServicio").empty();
                               $("#cmbServicio").append(message);  
                     },
                     complete: function() {
                       // setTimeout($.unblockUI, 1000);
                    }
                       
                   });

                    function verTipoArchivo(data){
                         var tregistros = '<option value="">Servicios..</option>';
                             for(var i in data){
                                 tregistros =tregistros + '<option value='+data[i].clase_vehiculo_servicio_id+'>'+ data[i].tipo_servicio.nombre +' </option>';

                          }
                            return tregistros;
                    }
            }   
        }
   
</script>


@endsection
@section("scripts")
  
<script type="text/javascript">
 

$(document).ready(function () {

   var menu=[];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


         $(".btn_buscarSolicitud").click(function (event) {
                  $('#mensajes').removeClass('alert alert-success');
                  $('#mensajes').addClass('hide');
                                                  
                 
                  var servicios_ciente_id= $("#servicios_ciente_id").val();
                  menu=[];
                  limpiar();
                     $.ajax({
                              url: '{{ url('/cargarPorSolicitudClienetVehiculo') }}',
                              type: 'post',
                              data: {'servicios_ciente_id':servicios_ciente_id},
                               beforeSend: function(){
                                },
                               success: function(data) {  
                                console.log(data);
                                
                                if(data.length>0){ 

                                        var objCliente;
                                        var objclienteVehiculo;

                                         for(var i in data){

                                          
                                           objCliente=data[i].servicios_cliente.cliente; 


                                               var miAuto = new Object();
                                  
                                               miAuto["det_servicios_cliente_id"]=data[i].det_servicios_cliente_id;
                                               miAuto["insumos_id"] = data[i].insumos_id;
                                                miAuto["vehiculo_id"] = data[i].vehiculo_id;
                                                miAuto["vehiculoNombre"] = data[i].cliente_vehiculo.vehiculo.marca;
                                                miAuto["servicioNombre"] = data[i].clase_vehiculo_servicio.tipo_servicio.nombre;
                                                miAuto["InsumosNombre"] = data[i].insumos.nombre;
                                                miAuto["Kilometraje_inicio"] =data[i].kilometraje_inicio;
                                                miAuto["kilometraje_sustitucion"] =data[i].kilometraje_sustitucion;
                                                miAuto["fecha_sustitucion"] =data[i].fecha_sustitucion;
                                                miAuto["clase_vehiculo_servicio_id"] = data[i].clase_vehiculo_servicio_id;
                                                if(data[i].cantidad_cambio!=null){
                                                   miAuto["cantidad_cambio"] = data[i].cantidad_cambio; 
                                                }else{
                                                    miAuto["cantidad_cambio"] ="";
                                                }
                                                  

                                                miAuto["Fecha_Inicio"] = data[i].fecha_inicio; 
                                   
                                    
                             
                                                menu.push(miAuto);


                                         }
                                        
                                        $("#nombre").val(objCliente.nombre);
                                        $("#apellido").val(objCliente.apellido);
                                        $("#cedula").val(objCliente.cedula);
                                        
                                        
                                       console.log(menu);
                                        tabla=dibujatabla(menu);
                                        $("#tbl_vehiculo").empty();
                                        document.getElementById('tbl_vehiculo').innerHTML = tabla; 
                                         addAEvent(); 
                                         $("#btn_editar").prop('disabled',true);






                                         $('#automovil').DataTable({
                                               'columnDefs': [{
                                               'targets': 0,
                                               'searchable': false,
                                               'orderable': false,
                                               'className': 'dt-body-center',
                                               'search': 'applied',
                                               'render': function (data, type, full, meta){
                                                
                                                   return '<input class="vehiculo_id" type="checkbox" checked="true" name="idprov[]" value="' + $('<div/>').text(data).html() + '">';
                                                 } 
                                              
                                            }],
                                                'order': [[1, 'asc']],
                                                        dom: 'Bfrtip',
                                             buttons: [
                                                {
                                                    extend: 'pdfHtml5',
                                                    download: 'open'
                                                }
                                            ]

                                        });

                                }else{
                                    
                                     mensajePersonalizado("", 'No se encontrarón registros con cedula N. '+cedula+'');
                                }
           
                              },
                              error: function (xhr, status) {
                                  alert('Disculpe, existió un problema');
                              }  

                          });   
                
            }); 


        $('#tblMateria').DataTable({
                responsive: true
        });

  function limpiar(){
      $("#nombre").val("");
      $("#apellido").val("");
      $("#cedula").val();      
      $("#vehiculo_id").val();
      $("#insumos_id").val();
      $("#Kilometraje_inicio").val();
      $("#kilometraje_sustitucion").val();
      $("#fecha_sustitucion").val();
      $("#clase_vehiculo_servicio_id").val();
      $("#cantidad_cambio").val();

      $("#tbl_vehiculo").append("");
      $("#select_id").val("");
      menu=[];
      document.getElementById('tbl_vehiculo').innerHTML = ""; 
       limpiarMensajes();
        $("#btn_editar").prop('disabled',false);

       }
 
  $("#btn_limpiar").click(function (event) {
     limpiar();
     $("#cedula").val("");


  }); 

 $(".btn_buscar").click(function (event) {

         $('#mensajes').removeClass('alert alert-success');
         $('#mensajes').addClass('hide');
                                        
         var fila = $(this).parents('tr');
         var cadena = JSON.stringify(fila.data('id'));
         var pacienteDatos = eval('(' + cadena + ')');

        var cedula= $("#cedula").val();
        lstVehiculo=[];
        limpiar();
        var message=null;
           $.ajax({
                    url: '{{ url('/cargarPorCedula') }}',
                    type: 'post',
                    data: {'cedula':cedula},
                     beforeSend: function(){
                      },
                     success: function(data) {  
                       
                      if(data.length>0){ 

                              var objCliente;
                              var objclienteVehiculo;

                               for(var i in data){

                                 data[i].vehiculo['cliente_vehiculo_id']=data[i].cliente_vehiculo_id;
                                 lstVehiculo.push(data[i].vehiculo);
                                 objCliente=data[i].cliente; 

                               }
                              
                              $("#nombre").val(objCliente.nombre);
                              $("#apellido").val(objCliente.apellido);
                              $("#cedula").val(objCliente.cedula);
                              $("#cliente_id").val(objCliente.cliente_id);
                               
                               var vehiculos= verPeriodo(lstVehiculo);
                               message='<select id="vehiculo_id"   onclick="consultarcedulas();" name="vehiculo_id" class="form-control">'+vehiculos+'</select>';

                               $("#cmb_vehiculos").empty();
                               $("#cmb_vehiculos").append(message);                              
                               //consultaServicios();
                      }else{
                          
                           mensajePersonalizado("", 'No se encontrarón registros con cedula N. '+cedula+'');
                      }
 
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    }  

                });   


            function verPeriodo(data){
                         var tregistros = '<option value="">Vehiculos..</option>';
                             for(var i in data){
                                 tregistros =tregistros + '<option value='+data[i].vehiculo_id+'>Nombre :'+ data[i].marca +' ,Clase vehiculo: '+data[i].clase_vehiculo.nombre+ ' </option>';

                          }
                            return tregistros;
                    }  
            
     }); 

     

    
           


     
      $("#btn_agregar").click(function (event) {


      var bValid = true; 
      

      var vehiculo_id =$("#vehiculo_id").val();
      var insumos_id = $("#insumos_id").val();
      var Kilometraje_inicio =$("#Kilometraje_inicio").val();
      var kilometraje_sustitucion = $("#kilometraje_sustitucion").val();
      var fecha_sustitucion = $("#fecha_sustitucion").val();
      var clase_vehiculo_servicio_id =$("#clase_vehiculo_servicio_id").val();

      bValid = bValid && validarCampoLleno(vehiculo_id, 'Vehiculo');
      bValid = bValid && validarCampoLleno(insumos_id, 'Insumos');
      bValid = bValid && validarCampoLleno(Kilometraje_inicio, 'kilometraje inicio');
      bValid = bValid && validarCampoLleno(kilometraje_sustitucion, 'kilometraje sustitución');
      bValid = bValid && validarCampoLleno(fecha_sustitucion, 'Fecha sustitución');
      bValid = bValid && validarCampoLleno(clase_vehiculo_servicio_id, '  Servicio');
     

      if (bValid == true){
                var combo = document.getElementById("vehiculo_id");
                var vehiculoNombre = combo.options[combo.selectedIndex].text;
                var combo2 = document.getElementById("clase_vehiculo_servicio_id");
                var servicioNombre = combo2.options[combo2.selectedIndex].text;
                var combo3 = document.getElementById("insumos_id");
                var InsumosNombre = combo3.options[combo3.selectedIndex].text;
              

                var vehiculo_id =$("#vehiculo_id").val();
                var insumos_id = $("#insumos_id").val();
                var Kilometraje_inicio =$("#Kilometraje_inicio").val();
                var kilometraje_sustitucion = $("#kilometraje_sustitucion").val();
                var fecha_sustitucion = $("#fecha_sustitucion").val();
                var clase_vehiculo_servicio_id =$("#clase_vehiculo_servicio_id").val();
                var cantidad_cambio=$("#cantidad_cambio").val();
                var existe=false;


                  if(menu.length>0){
                     for (var i in menu) {
                          if(menu[i].det_servicios_cliente_id==$("#det_servicios_cliente_id").val()){

                                menu[i].det_servicios_cliente_id=$("#det_servicios_cliente_id").val();
                                menu[i].insumos_id=insumos_id;
                                menu[i].vehiculo_id=vehiculo_id;
                                menu[i].vehiculoNombre=vehiculoNombre;
                                menu[i].servicioNombre=servicioNombre;
                                menu[i].InsumosNombre=InsumosNombre;
                                menu[i].Kilometraje_inicio=Kilometraje_inicio;
                                menu[i].kilometraje_sustitucion=kilometraje_sustitucion;
                                menu[i].fecha_sustitucion=fecha_sustitucion;
                                menu[i].clase_vehiculo_servicio_id=clase_vehiculo_servicio_id;
                                menu[i].cantidad_cambio=cantidad_cambio;
                                menu[i].Fecha_Inicio=moment().format('YYYY-MM-DD');
                                existe=true;

                          }
                       }  
                   } 

              if(!existe){          


                            var miAuto = new Object();
                            
                            miAuto["det_servicios_cliente_id"]=menu.length+1;
                            miAuto["insumos_id"] = insumos_id;
                            miAuto["vehiculo_id"] = vehiculo_id;
                            miAuto["vehiculoNombre"] = vehiculoNombre;
                            miAuto["servicioNombre"] = servicioNombre;
                            miAuto["InsumosNombre"] = InsumosNombre;
                            miAuto["Kilometraje_inicio"] = Kilometraje_inicio;
                            miAuto["kilometraje_sustitucion"] = kilometraje_sustitucion;
                            miAuto["fecha_sustitucion"] = fecha_sustitucion;
                            miAuto["clase_vehiculo_servicio_id"] = clase_vehiculo_servicio_id;
                            miAuto["cantidad_cambio"] = cantidad_cambio;
                            miAuto["Fecha_Inicio"] = moment().format('YYYY-MM-DD'); 
                           
                            
                     
                              menu.push(miAuto);
             }    


                     tabla=dibujatabla(menu);
                
                    document.getElementById('tbl_vehiculo').innerHTML = tabla; 
                    addAEvent();   


                     $('#automovil').DataTable({
                           'columnDefs': [{
                           'targets': 0,
                           'searchable': false,
                           'orderable': false,
                           'className': 'dt-body-center',
                           'search': 'applied',
                           'render': function (data, type, full, meta){
                            
                               return '<input class="det_servicios_cliente_id" type="checkbox" checked="true" name="idprov[]" value="' + $('<div/>').text(data).html() + '">';
                             } 
                          
                        }],
                            'order': [[1, 'asc']]


                    }); 

                $("#vehiculo_id").val("");
                $("#insumos_id").val("");
                $("#kilometraje_sustitucion").val("");
                $("#fecha_sustitucion").val("");
                $("#clase_vehiculo_servicio_id").val("");
                $("#cantidad_cambio").val("");
                $("#det_servicios_cliente_id").val("");
          }      
       
     });  

 addAEvent();

      function dibujatabla(menu){

         var tabla = '<table id="automovil" class="display" >'
        tabla+= '<thead>'+
                '<tr>'+
                   '<th style="background: rgba(239, 255, 0, 0.31); display:none"> <input  checked="true" type="checkbox" name="select_alls" value="1" id="example-select-alls"></th>'+
                     '<th>Vehiculo</th>'+
                     '<th>Servicio</th>'+
                     '<th>Insumo</th>'+
                     '<th>Km Inicio</th>'+
                     '<th>Km sustitucion</th>'+
                     '<th>Fecha Sustitución</th>'+
                     '<th>cantidad cambio</th>'+ 
                     '<th>Selección</th>'+                   
                 '</tr>'+
              '</thead>'; 
         
        for (var i in menu) 
        {

        
       tabla += '<tr data-id={"det_servicios_cliente_id":"'+menu[i].det_servicios_cliente_id+'","insumos_id":"'+menu[i].insumos_id+'","vehiculo_id":"'+menu[i].vehiculo_id+'","clase_vehiculo_servicio_id":"'+menu[i].clase_vehiculo_servicio_id+'","Kilometraje_inicio":"'+menu[i].Kilometraje_inicio+'","kilometraje_sustitucion":"'+menu[i].kilometraje_sustitucion+'","cantidad_cambio":"'+menu[i].cantidad_cambio+'","fecha_sustitucion":"'+menu[i].fecha_sustitucion+'"}>'
         +'<td style="display:none">'+menu[i].det_servicios_cliente_id+'</td>'     
         +'<td>'+menu[i].vehiculoNombre+'<input name="vehiculo_id" value="'+menu[i].vehiculo_id+'" type="hidden" class="vehiculo_id" /></td>' 
         +'<td>'+menu[i].servicioNombre+'<input name="clase_vehiculo_servicio_id" value="'+menu[i].clase_vehiculo_servicio_id+'" type="hidden"  class="clase_vehiculo_servicio_id" /></td>'
         +'<td>'+menu[i].InsumosNombre+'<input name="insumos_id" value="'+menu[i].insumos_id+'" type="hidden"  class="insumos_id" /></td>'
         +'<td><input name="Kilometraje_inicio" value="'+menu[i].Kilometraje_inicio+'" type="hidden" class="Kilometraje_inicio" />'+menu[i].Kilometraje_inicio+'</td>'
         +'<td>'+menu[i].kilometraje_sustitucion+' <input name="kilometraje_sustitucion" value="'+menu[i].kilometraje_sustitucion+'" type="hidden"  class="kilometraje_sustitucion" /></td>'
         +'<td>'+menu[i].fecha_sustitucion+' <input name="fecha_sustitucion" value="'+menu[i].fecha_sustitucion+'" type="hidden" id="fecha_sustitucion" class="fecha_sustitucion" /></td>'
        +'<td>'+menu[i].cantidad_cambio+' <input name="cantidad_cambio" value="'+menu[i].cantidad_cambio+'" type="hidden"  class="cantidad_cambio" /></td>'
        +'<td><button type="button"  class="fa fa-pencil-square-o btn_edit" ></button> </td>'
          +'</tr>';
        }
         
        tabla += '</table>'
        return tabla;

    }   



function addAEvent(){
       $(".btn_edit").click(function (event) {
         var fila = $(this).parents('tr');
         var cadena = JSON.stringify(fila.data('id'));
        var datos = eval('(' + cadena + ')');
         $("#vehiculo_id").val(datos.vehiculo_id);
          buscarServicios(datos.clase_vehiculo_servicio_id);
         // $("#clase_vehiculo_servicio_id").val(datos.clase_vehiculo_servicio_id);
          $("#det_servicios_cliente_id").val(datos.det_servicios_cliente_id);
          $("#kilometraje_sustitucion").val(datos.kilometraje_sustitucion);
          $("#fecha_sustitucion").val(datos.fecha_sustitucion);
          $("#cantidad_cambio").val(datos.cantidad_cambio);
          $("#insumos_id").val(datos.insumos_id);
          $("#det_servicios_cliente_id").val(datos.det_servicios_cliente_id);
          limpiarMensajes();

       }); 
}     

      $("#btn_editar").click(function (event) {

      var bValid = true;  
      var nombre=$("#nombre").val();
      var apellido=$("#apellido").val();
      var cedula=$("#cedula").val();
      var cliente_id= $("#cliente_id").val();

      

      bValid = bValid && validarCampoLleno(nombre, 'Nombre');
      bValid = bValid && validarCampoLleno(apellido, 'Apellido');
      bValid = bValid && validarCampoLleno(cedula, 'Cedula');
      



      if (bValid == true){

                 
                  var lstDetServicioCliente=[];

             var objTables = $("#automovil").DataTable();
                
              $(':checkbox', objTables.rows().nodes()).each(function(){             
         
              var    clase_vehiculo_servicio_id =  $(this).parent().parent().find(".clase_vehiculo_servicio_id").val();
              var    insumos_id =  $(this).parent().parent().find(".insumos_id").val();
              var    Kilometraje_inicio =  $(this).parent().parent().find(".Kilometraje_inicio").val();
              var    kilometraje_sustitucion =  $(this).parent().parent().find(".kilometraje_sustitucion").val();
              var    fecha_sustitucion =  $(this).parent().parent().find(".fecha_sustitucion").val();
              var    cantidad_cambio =  $(this).parent().parent().find(".cantidad_cambio").val();
              var    vehiculo_id =  $(this).parent().parent().find(".vehiculo_id").val();
              
              
                                

                      var objVehiculo = new Object();
                      objVehiculo["clase_vehiculo_servicio_id"] = clase_vehiculo_servicio_id;
                      objVehiculo["insumos_id"] = insumos_id;
                      objVehiculo["Kilometraje_inicio"] = Kilometraje_inicio;
                      objVehiculo["kilometraje_sustitucion"] = kilometraje_sustitucion;
                      objVehiculo["fecha_sustitucion"] = fecha_sustitucion;
                      objVehiculo["cantidad_cambio"] = cantidad_cambio;
                      objVehiculo["vehiculo_id"] = vehiculo_id;
                      objVehiculo["cliente_id"] =cliente_id;

                      
                    

                      lstDetServicioCliente.push(objVehiculo);
                      
                  });

                if(lstDetServicioCliente.length==0){

                   validarCampoLleno("", 'ingrese un vehiculo');
                   return;
                }
                    
                   
                     
                       $.ajax({
                          url: '{{ url('/ingresoServiciosCliente') }}',
                          type: 'post',
                          data: {'lstDetServicioCliente':lstDetServicioCliente, 'cliente_id': cliente_id},
                           beforeSend: function(){
                            },
                           success: function(data) {  
                             
                              window.location.reload(true); 
       
                          },
                          error: function (xhr, status) {
                              alert('Disculpe, existió un problema');
                          }  

                    });   
                  

        }

     });


       function buscarServicios(servicio_id){

               var vehiculo_id= $("#vehiculo_id").val();
               if(vehiculo_id!=""){

                    $.ajax({
                         url: '{{ url('/buscarserviciosPorClaseVehiculo') }}',
                         type: 'post',
                         data: {'vehiculo_id': vehiculo_id},
                         beforeSend: function() {
                            //$.blockUI({ message: '<h4><img src="../imagenes/gif/progress.gif" /></br> PROCESANDO... Espere un momento porfavor </h4>' });
                          },
                         error : function(jqXHR, textStatus, errorThrown) {
                            var gnrMensaje =$("#gnrMensaje");
                            if(jqXHR.status == '401'){
                                gnrMensaje.text("Su sesión ha caducado, porfavor de click en Salir y vuelva a Ingresar."); 
                                $('#gnrError').modal('show');
                            }else{
                               alert('Disculpe, existió un problema');
                            }     
                        },
                         success: function(data) {


                        // var cadena = JSON.stringify(data);
                         var materias= verTipoArchivo(data);
                                var message='<select id="clase_vehiculo_servicio_id"  onclick="consultarDias();" name="clase_vehiculo_servicio_id"  class="form-control">'+materias+
                                            '</select>';
                               $("#cmbServicio").empty();
                               $("#cmbServicio").append(message);
                                $("#clase_vehiculo_servicio_id").val(servicio_id);  
                     },
                     complete: function() {
                       // setTimeout($.unblockUI, 1000);
                    }
                       
                   });

                    function verTipoArchivo(data){
                         var tregistros = '<option value="">Servicios..</option>';
                             for(var i in data){
                                 tregistros =tregistros + '<option value='+data[i].clase_vehiculo_servicio_id+'>'+ data[i].tipo_servicio.nombre +' </option>';

                          }
                            return tregistros;
                    }
            } 
          
              
        }
   

  });   
 </script>  
@endsection
