
@extends('layouts.menu')

@section('content')

<div class="container">

  <div class="page-header">
              <h1>
                Registro de cliente
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  Referencial 
                </small>
              </h1>
            </div><!-- /.page-header -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Cliente / vehiculo</div>

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
                  <input name="tipo_servicio_id" type="hidden" id="tipo_servicio_id" class="width-100" />

         <div class="row"> 

                <div class="col-sm-4"> 
              <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Nombre</label>

                    <div class="col-xs-12 col-sm-8">
                      <span class="block input-icon input-icon-right">
                        <input name="nombre" type="text" id="nombre" class="width-100" />
                        
                        <input name="nombre" type="hidden" id="cliente_id" class="width-100" />
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
              </div>

              <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Apellido</label>

                    <div class="col-xs-12 col-sm-8">
                      <span class="block input-icon input-icon-right">
                        <input name="apellido" type="text" id="apellido" class="width-100" />
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
              </div>
              <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Cedula</label>
                      
                    <div class="col-xs-12 col-sm-8">
                      <span class="block input-icon input-icon-right">
                        <input name="cedula" type="number" id="cedula" class="width-100" />
                        <a></a>
                      </span>
                    </div>
                     <a class="btn_buscar"  href="#" data-toggle="modal"  data-placement="left" title= "Consulta Trabajador">
                                <i class="fa fa-search icon-paciente"></i>
                      </a>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
              </div>
              <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">teléfono</label>

                    <div class="col-xs-12 col-sm-8">
                      <span class="block input-icon input-icon-right">
                        <input name="telefono" type="number" id="telefono" class="width-100" />
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
              </div>
              <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Movil</label>

                    <div class="col-xs-12 col-sm-8">
                      <span class="block input-icon input-icon-right">
                        <input name="movil" type="number" id="movil" class="width-100" />
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
              </div>
               <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Correo</label>

                    <div class="col-xs-12 col-sm-8">
                      <span class="block input-icon input-icon-right">
                        <input name="correo" type="text" id="correo" class="width-100" />
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
              </div>
               <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Dirección</label>

                    <div class="col-xs-12 col-sm-8">
                      <span class="block input-icon input-icon-right">
                        <input name="direccion" type="text" id="direccion" class="width-100" />
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
              </div>

            </div>  

              <div class="col-sm-7">     
                    <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Marca</label>

                    <div class="col-xs-12 col-sm-7">
                      <span class="block input-icon input-icon-right">
                        <input name="marca" type="text" id="marca" class="width-100" />
                        <input name="select_id" type="hidden" id="select_id" class="width-100" />
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
                    </div>
                    <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Color</label>

                    <div class="col-xs-12 col-sm-7">
                      <span class="block input-icon input-icon-right">
                        <input name="color" type="text" id="color" class="width-100" />
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
                    </div>

                     <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Placa</label>

                    <div class="col-xs-12 col-sm-7">
                      <span class="block input-icon input-icon-right">
                        <input name="placa" type="text" id="placa" class="width-100" />
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
                    </div>

                     <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Uso Personal</label>

                    <div class="col-xs-12 col-sm-7">
                      <span class="block input-icon input-icon-right">
                        
                         <select id="uso_personal" name="uso_personal" class="form-control" data-placeholder="Click to Choose...">

                          <option value="">&nbsp;</option>
                          
                                        <option  value="S">si</option> 
                                        <option  value="N">no</option> 
                           
                        </select>
                      
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
                    </div>

                     <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Anio</label>

                    <div class="col-xs-12 col-sm-7">
                      <span class="block input-icon input-icon-right">
                        <input name="anio" type="number" id="anio" class="width-100" />
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Clase Vehiculo</label>

                      <div class="col-md-5">
                         <select id="clase_vehiculo" name="clase_vehiculo" class="form-control" data-placeholder="Click to Choose...">

                          <option value="">&nbsp;</option>
                           @foreach($lstClaseVehiculo as $item) 
                                        <option  value="{{$item->clase_vehiculo_id}}">{{$item->nombre}}</option> 
                           @endforeach
                        </select>
                      </div>

                  

                     <a id="btn_agregar" class="col-md-1" type="button" data-toggle="tooltip" data-placement="left" title="Agrega vehiculo">
                                <i class="fa fa-plus-circle fa-2x"></i>
                            </a>
                    </div> 
                    
                     <div class="form-group">
                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Estado</label>

                      <div class="col-md-5">
                         <select id="estado_id" name="estado_id" class="form-control" data-placeholder="Click to Choose...">

                          <option value="">&nbsp;</option>
                           @foreach($lstEstado as $item) 
                                        <option  value="{{$item->estado_id}}">{{$item->nombre}}</option> 
                           @endforeach
                        </select>
                      </div>
                    
                    </div>



                 <div class="form-group">  
                   <div class="col-md-3">  
                          <button id="btn_editar" class="btn btn-primary " type="button"  />  Guardar</button> 
                    </div>
                    <div class="col-md-3">  
                          <button id="btn_limpiar" class="btn btn-primary " type="button"  />  Limpiar</button> 
                    </div>
                 </div>   
                   
            </div>

            

      </div>       
                   
                    <div class="form-group "> 
                        <div class="panel-heading">LISTADO DE VEHICULOS</div>
                               <div id="tbl_vehiculo"></div> 
                                
                          </div> 
                  </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

   
</script>

@endsection
@section("scripts")

  <script type="text/javascript">
   

</script>
<script type="text/javascript">
 

$(document).ready(function () {

   var menu=[];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#tblMateria').DataTable({
                responsive: true
        });

  function limpiar(){
      $("#nombre").val("");
      $("#apellido").val("");
     
      $("#telefono").val("");
      $("#movil").val("");
      $("#correo").val("");
      $("#direccion").val("");
      $("#cliente_id").val("");

      $("#marca").val("");
      $("#color").val("");
      $("#placa").val("");
      $("#uso_personal").val("");
      $("#anio").val("");
      $("#clase_vehiculo").val("");
      $("#tbl_vehiculo").append("");
      $("#estado_id").val("");
      $("#select_id").val("");
      menu=[];
      document.getElementById('tbl_vehiculo').innerHTML = ""; 
      $('#mensajesController').removeClass('alert alert-danger');
       $('#mensajesController').removeClass('alert alert-success');
       $('#mensajesController').removeClass('alert alert-info');
       $('#mensajesController').addClass('hide');   
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
        menu=[];
        limpiar();
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
                                 menu.push(data[i].vehiculo);
                                 objCliente=data[i].cliente; 

                               }
                              
                              $("#nombre").val(objCliente.nombre);
                              $("#apellido").val(objCliente.apellido);
                              $("#cedula").val(objCliente.cedula);
                              $("#telefono").val(objCliente.telefono);
                              $("#movil").val(objCliente.movil);
                              $("#correo").val(objCliente.correo);
                              $("#direccion").val(objCliente.direccion);

                              

                            $("#cliente_id").val(objCliente.cliente_id);
                             console.log(menu);
                              tabla=dibujatabla2(menu);
                             
                              $("#tbl_vehiculo").val(tabla);
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
                                      
                                         return '<input class="vehiculo_id" type="checkbox" checked="true" name="idprov[]" value="' + $('<div/>').text(data).html() + '">';
                                       } 
                                    
                                  }],
                                      'order': [[1, 'asc']]


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


      function dibujatabla2(menu){

         var tabla = '<table id="automovil" class="table table-striped table-bordered" >'
        tabla+= '<thead>'+
                '<tr>'+
                   '<th style="background: rgba(239, 255, 0, 0.31); display:none"> <input  checked="true" type="checkbox" name="select_alls" value="" id="example-select-alls"></th>'+
                     '<th>Marca</th>'+
                     '<th>Color</th>'+
                     '<th>Placa</th>'+
                     '<th>Uso Personal</th>'+
                     '<th>Anio</th>'+
                     '<th>Clase Vehiculo</th>'+
                     '<th>Estado</th>'+
                     '<th style="display:none"></th>'+
                     '<th>Accion</th>'+
                 '</tr>'+
              '</thead><tbody>'; 
         
        for (var i in menu) 
        {

           menu[i]["clase_vehiculo"]=menu[i].clase_vehiculo.nombre;
           menu[i]["estadoNombre"] = menu[i].estado.nombre;
        
           tabla += '<tr data-id={"vehiculo_id":"'+menu[i].vehiculo_id+'","marca":"'+menu[i].marca+'","color":"'+menu[i].color+'","placa":"'+menu[i].placa+'","uso_personal":"'+menu[i].uso_personal+'","anio":"'+menu[i].anio+'","clase_vehiculo":"'+menu[i].clase_vehiculo_id+'","estado_id":"'+menu[i].estado_id+'"}>'
           +'<td style="display:none">'+menu[i].vehiculo_id+'</td>'
          +'<td>'+menu[i].marca+'<input name="marca" value="'+menu[i].marca+'" type="hidden" id="marca" class="marca" /></td>'
          +'<td>'+menu[i].color+'<input name="color" value="'+menu[i].color+'" type="hidden" id="color" class="color" /></td>' 
          +'<td>'+menu[i].placa+'<input name="placa" value="'+menu[i].placa+'" type="hidden" id="placa" class="placa" /></td>'
          +'<td><input name="uso_personal" value="'+menu[i].uso_personal+'" type="hidden" id="uso_personal" class="uso_personal" />'+menu[i].uso_personal+'</td>'
          +'<td>'+menu[i].anio+' <input name="anio" value="'+menu[i].anio+'" type="hidden" id="anio" class="anio" /></td>'
          +'<td>'+menu[i].clase_vehiculo+'<input name="clase_vehiculo_id" value="'+menu[i].clase_vehiculo_id+'" type="hidden" id="clase_vehiculo_id" class="clase_vehiculo_id" /></td>'
          +'<td>'+menu[i].estadoNombre+' <input name="estado_id" value="'+menu[i].estado_id+'" type="hidden" id="estado_id" class="estado_id" /></td>'
          +'<td style="display:none"><input name="cliente_vehiculo_id" value="'+menu[i].cliente_vehiculo_id+'" type="hidden" id="cliente_vehiculo_id" class="cliente_vehiculo_id" /></td>'
          +'<td><button type="button"  class="fa fa-pencil-square-o btn_editVehiculos" ></button> </td></tr>';
          
        }
         
        tabla += '</tbody></table>'

        return tabla;
    }      

     
      $("#btn_agregar").click(function (event) {

      var bValid = true; 
      
      bValid = bValid && validarCampoLleno($("#marca").val(), 'Marca');
      bValid = bValid && validarCampoLleno($("#color").val(), 'Color');
      bValid = bValid && validarCampoLleno($("#placa").val(), 'Placa');
      bValid = bValid && validarCampoLleno($("#uso_personal").val(), 'Uso personal');
      bValid = bValid && validarCampoLleno($("#anio").val(), 'Anio');
      bValid = bValid && validarCampoLleno($("#clase_vehiculo").val(), 'Clase vehiculo');
      bValid = bValid && validarCampoLleno($("#estado_id").val(), 'Estado');
      
      

      if (bValid == true){
                var combo = document.getElementById("estado_id");
                var estadoNombre = combo.options[combo.selectedIndex].text;
                var combo2 = document.getElementById("clase_vehiculo");
                var claseVehiculo = combo2.options[combo2.selectedIndex].text;
                var existe=false;
                
                if(menu.length>0){
                     for (var i in menu) 
                    {

                          if(menu[i].vehiculo_id==$("#select_id").val()){
                            menu[i].vehiculo_id=$("#select_id").val();
                            menu[i].marca=$("#marca").val();
                            menu[i].color=$("#color").val();
                            menu[i].placa=$("#placa").val();
                            menu[i].uso_personal=$("#uso_personal").val();
                            menu[i].anio=$("#anio").val();
                            menu[i].clase_vehiculo=claseVehiculo;
                            menu[i].clase_vehiculo_id=$("#clase_vehiculo").val();
                            menu[i].estado_id=$("#estado_id").val();
                            menu[i].estadoNombre=estadoNombre;
                            existe=true;

                          }
                     }  
                 } 

              if(!existe){

                     var fila = $(this).parents('tr');
                     var cadena = JSON.stringify(fila.data('id'));
                     var pacienteDatos = eval('(' + cadena + ')');

                    var marca=$("#marca").val();
                    var color=$("#color").val();
                    var placa=$("#placa").val();
                    var usoPersonal=$("#uso_personal").val();
                    var anio=$("#anio").val();
                    var claseVehiculo=claseVehiculo;
                    var estadoNombre=estadoNombre;
                    var clase_vehiculo_id = $("#clase_vehiculo").val();
                    var buscar=document.getElementById("clase_vehiculo").value;
                    var estado_id=$("#estado_id").val();
                    var miAuto = new Object();

                    miAuto["vehiculo_id"]=menu.length+1;
                    miAuto["marca"] = marca;
                    miAuto["color"] = color;
                    miAuto["placa"] = placa;
                    miAuto["uso_personal"] = usoPersonal;
                    miAuto["anio"] = anio;
                    miAuto["clase_vehiculo"] = claseVehiculo;
                    miAuto["clase_vehiculo_id"] = clase_vehiculo_id;
                    miAuto["estado_id"] = estado_id;
                    miAuto["estadoNombre"] = estadoNombre;
                    miAuto["cliente_vehiculo_id"] ="";
                    
                     
                     menu.push(miAuto);
                 }    


                     tabla=dibujatabla(menu);
                
                   // $("#tbl_vehiculo").val(tabla);
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
                            
                               return '<input class="vehiculo_id" type="checkbox" checked="true" name="idprov[]" value="' + $('<div/>').text(data).html() + '">';
                             } 
                          
                        }],
                            'order': [[1, 'asc']]


                    }); 

                $("#marca").val("");
                $("#color").val("");
                $("#placa").val("");
                $("#uso_personal").val("");
                $("#anio").val("");
                $("#clase_vehiculo").val("");
                $("#estado_id").val("");
                $("#select_id").val("");

          }      
       
     });  

 addAEvent();

      function dibujatabla(menu){

         var tabla = '<table id="automovil" class="table table-striped table-bordered" >'
        tabla+= '<thead>'+
                '<tr>'+
                   '<th style="background: rgba(239, 255, 0, 0.31); display:none"> <input  checked="true" type="checkbox" name="select_alls" value="1" id="example-select-alls"></th>'+
                     '<th>Marca</th>'+
                     '<th>Color</th>'+
                     '<th>Placa</th>'+
                     '<th>Uso Personal</th>'+
                     '<th>Anio</th>'+
                     '<th>Clase Vehiculo</th>'+
                     '<th>Estado</th>'+
                     '<th style="display:none"></th>'+
                     '<th>Accion</th>'+
                 '</tr>'+
              '</thead>'; 
         
        for (var i in menu) 
        {
        
       tabla += '<tr data-id={"vehiculo_id":"'+menu[i].vehiculo_id+'","marca":"'+menu[i].marca+'","color":"'+menu[i].color+'","placa":"'+menu[i].placa+'","uso_personal":"'+menu[i].uso_personal+'","anio":"'+menu[i].anio+'","clase_vehiculo":"'+menu[i].clase_vehiculo_id+'","estado_id":"'+menu[i].estado_id+'"}>'
   +'<td style="display:none">'+menu[i].vehiculo_id+'</td>'
        +'<td>'+menu[i].marca+'<input name="marca" value="'+menu[i].marca+'" type="hidden" id="marca" class="marca" /></td>'
        +'<td>'+menu[i].color+'<input name="color" value="'+menu[i].color+'" type="hidden" id="color" class="color" /></td>' 
        +'<td>'+menu[i].placa+'<input name="placa" value="'+menu[i].placa+'" type="hidden" id="placa" class="placa" /></td>'
        +'<td><input name="uso_personal" value="'+menu[i].uso_personal+'" type="hidden" id="uso_personal" class="uso_personal" />'+menu[i].uso_personal+'</td>'
        +'<td>'+menu[i].anio+' <input name="anio" value="'+menu[i].anio+'" type="hidden" id="anio" class="anio" /></td>'
        +'<td >'+menu[i].clase_vehiculo+'<input name="clase_vehiculo_id" value="'+menu[i].clase_vehiculo_id+'" type="hidden" id="clase_vehiculo_id" class="clase_vehiculo_id" /></td>'
        +'<td>'+menu[i].estadoNombre+' <input name="estado_id" value="'+menu[i].estado_id+'" type="hidden" id="estado_id" class="estado_id" /></td>'
        +'<td style="display:none"><input name="cliente_vehiculo_id" value="'+menu[i].cliente_vehiculo_id+'" type="hidden" id="cliente_vehiculo_id" class="cliente_vehiculo_id" /></td>'
         +'<td><button type="button"  class="fa fa-pencil-square-o btn_editVehiculos" ></button> </td>'
           +'</tr>';
        }
         
        tabla += '</table>'
        return tabla;




    }      

function addAEvent(){
       $(".btn_editVehiculos").click(function (event) {
        var fila = $(this).parents('tr');
         var cadena = JSON.stringify(fila.data('id'));
         var pacienteDatos = eval('(' + cadena + ')');
         console.log(pacienteDatos);

         $("#select_id").val(pacienteDatos.vehiculo_id);
         $("#marca").val(pacienteDatos.marca);
         $("#color").val(pacienteDatos.color);
         $("#placa").val(pacienteDatos.placa);
         $("#uso_personal").val(pacienteDatos.uso_personal);
         $("#anio").val(pacienteDatos.anio);
         $("#clase_vehiculo").val(pacienteDatos.clase_vehiculo);
         $("#estado_id").val(pacienteDatos.estado_id);
         
       
       }); 
}     

      $("#btn_editar").click(function (event) {

      var bValid = true;  
      var nombre=$("#nombre").val();
      var apellido=$("#apellido").val();
      var cedula=$("#cedula").val();
      var telefono=$("#telefono").val();
      var movil=$("#movil").val();
      var correo=$("#correo").val();
      var direccion=$("#direccion").val();
      var cliente_id=$("#cliente_id").val();

      var objTable = $("#automovil").DataTable();

      bValid = bValid && validarCampoLleno(nombre, 'Nombre');
      bValid = bValid && validarCampoLleno(apellido, 'Apellido');
      bValid = bValid && validarCampoLleno(cedula, 'Cedula');
      bValid = bValid && validarCampoLleno(telefono, 'Telefono');
      bValid = bValid && validarCampoLleno(movil, 'Movil');
      bValid = bValid && validarCampoLleno(correo, 'Correo');
      bValid = bValid && validarCampoLleno(direccion, 'Dirección');



      if (bValid == true){

                  var objVehiculo = new Object();
                  var objCiente= new Object();
                  objCiente["nombre"]=nombre;
                  objCiente["apellido"]=apellido;
                  objCiente["cedula"]=cedula;
                  objCiente["telefono"]=telefono;
                  objCiente["movil"]=movil;
                  objCiente["correo"]=correo;
                  objCiente["direccion"]=direccion;
                  var lstClienteVehiculo=[];

             
                
                  $(':checkbox', objTable.rows().nodes()).each(function(){             
            //if($(this).is('input[name="idprov[]"]:checked')){
                                var    usoPersonal =  $(this).parent().parent().find(".uso_personal").val();
                                var    anio =  $(this).parent().parent().find(".anio").val();
                                var    placa =  $(this).parent().parent().find(".placa").val();
                                var    marca =  $(this).parent().parent().find(".marca").val();
                                var    color =  $(this).parent().parent().find(".color").val();
                                var    clase_vehiculo_id =  $(this).parent().parent().find(".clase_vehiculo_id").val();
                                var    vehiculo_id =  $(this).parent().parent().find(".vehiculo_id").val();
                                var    estado_id =  $(this).parent().parent().find(".estado_id").val();
                                var    cliente_vehiculo_id=$(this).parent().parent().find(".cliente_vehiculo_id").val();

                                var objVehiculo = new Object();
                                objVehiculo["vehiculo_id"] = vehiculo_id;
                                objVehiculo["marca"] = marca;
                                objVehiculo["color"] = color;
                                objVehiculo["placa"] = placa;
                                objVehiculo["uso_personal"] = usoPersonal;
                                objVehiculo["anio"] = anio;
                                objVehiculo["clase_vehiculo_id"] = clase_vehiculo_id;
                                objVehiculo["estado_id"] = estado_id;
                                objVehiculo["cliente_vehiculo_id"] = cliente_vehiculo_id;

                    lstClienteVehiculo.push(objVehiculo);
                    
                  });

                if(lstClienteVehiculo.length==0){

                   validarCampoLleno("", 'ingrese un vehiculo');
                   return;
                }

                    console.log(cliente_id);
                     $.ajax({
                                url: '{{ url('/ingresoClienteVehiculo') }}',
                                type: 'post',
                                data: {'lstVehiculos':lstClienteVehiculo, 'cliente': objCiente, 'cliente_id':cliente_id},
                                 beforeSend: function(data){
                                        $('#mensajes').removeClass('alert alert-danger');
                                        $('#mensajes').addClass('hide');
                                        

                                      },
                                 success: function(data) {  
                                    console.log(data);
                                    window.location.reload(true); 
                                },
                                error: function ( xhr, status,error) {
                                 
                                    alert('Disculpe, existió un problema');
                                }  

                            }); 


                  

        }

     });
      

  });   
 </script>  
@endsection
