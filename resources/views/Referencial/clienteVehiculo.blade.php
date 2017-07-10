
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
                <div class="panel-heading">Registro de Cliente</div>

                <div class="">

               
                <form class="form-horizontal" id="sample-form" method="POST" enctype="multipart/form-data"  action="{{url('/guardarTipoServicio')}}" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         @if(Session::has('message'))
                                <div class="alert alert-success" >
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                    <p> {{Session::get('message')}} </p>
                                </div>
                         @endif
                         @if(Session::has('message_i'))
                                <div class="alert alert-info" >
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                    <p> {{Session::get('message_i')}} </p>
                                </div>
                         @endif
                       
                          @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div id="errores" class=" "> 
                            <p class="validateTips"></p> 
                        </div> 
                  <input name="tipo_servicio_id" type="hidden" id="tipo_servicio_id" class="width-100" />

         <div class="row"> 

                <div class="col-sm-4"> 
              <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Nombre</label>

                    <div class="col-xs-12 col-sm-8">
                      <span class="block input-icon input-icon-right">
                        <input name="nombre" type="text" id="nombre" class="width-100" />
                       
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

                          <option value="Seleccione...  ">&nbsp;</option>
                          
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

                          <option value="Seleccione...  ">&nbsp;</option>
                           @foreach($lstClaseVehiculo as $item) 
                                        <option  value="{{$item->estado_id}}">{{$item->nombre}}</option> 
                           @endforeach
                        </select>
                      </div>

                  <br> <button id="btn_agregar" class ="fa fa-plus-circle" type="button"  />  Agrega</button> 
                    </div>  

                    <button id="btn_guardar" class ="fa fa-plus-circle" type="button"  />  Agrega</button> 

                     <div id="tbl_vehiculo"></div> 
            </div>

          

      </div>       
                   
                    <div class="form-group "> 
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                
                                </div>
                                
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



 $(".btn_buscar").click(function (event) {
  
         var fila = $(this).parents('tr');
         var cadena = JSON.stringify(fila.data('id'));
         var pacienteDatos = eval('(' + cadena + ')');

        var cedula= $("#cedula").val();
         
         console.log(cedula);
           $.ajax({
                    url: '{{ url('/cargarPorCedula') }}',
                    type: 'post',
                    data: {'cedula':cedula},
                     beforeSend: function(){
                          },
                     success: function(data) {  
                        console.log(data);
                        var objCliente;
                       for(var i in data){
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
      
       
        tabla=dibujatabla2(menu);
        console.log(tabla);
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
                
                   return '<input type="checkbox" checked="true" name="idprov[]" value="' + $('<div/>').text(data).html() + '">';
                 } 
              
            }],
                'order': [[1, 'asc']]


        });

        /* $("#btn_editVehiculos").click(function (event) {
        alert();
         var fila = $(this).parents('tr');
         var cadena = JSON.stringify(fila.data('id'));
          console.log(fila);
         var pacienteDatos = eval('(' + cadena + ')');
          console.log(cadena);

          var $row = $(this).closest("tr"),       // Finds the closest row <tr> 
    $tds = $row.find("td");             // Finds all children <td> elements

$.each($tds, function() {               // Visits every single <td> element
    console.log($(this).text());        // Prints out the text within the <td>
});
       });  */
 
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
                     '<th>Accion</th>'+
                 '</tr>'+
              '</thead><tbody>'; 
         
        for (var i in menu) 
        {
        
           tabla += '<tr><td style="display:none"></td>'
          +'<td>'+menu[i].marca+'<input name="marca" value="'+menu[i].marca+'" type="hidden" id="marca" class="marca" /></td>'
          +'<td>'+menu[i].color+'<input name="color" value="'+menu[i].color+'" type="hidden" id="color" class="color" /></td>' 
          +'<td>'+menu[i].placa+'<input name="placa" value="'+menu[i].placa+'" type="hidden" id="placa" class="placa" /></td>'
          +'<td><input name="uso_personal" value="'+menu[i].uso_personal+'" type="hidden" id="uso_personal" class="uso_personal" />'+menu[i].uso_personal+'</td>'
          +'<td>'+menu[i].anio+' <input name="anio" value="'+menu[i].anio+'" type="hidden" id="anio" class="anio" /></td>'
          +'<td>'+menu[i].clase_vehiculo.descripcion+'<input name="clase_vehiculo_id" value="'+menu[i].clase_vehiculo_id+'" type="hidden" id="clase_vehiculo_id" class="clase_vehiculo_id" /></td>'
          +'<td><button type="button"  class="btn btn-primary btn_editVehiculos" >cerrar</button> </td></tr>';
          
        }
         
        tabla += '</tbody></table>'

        return tabla;
    }      

     
      $("#btn_agregar").click(function (event) {

        var existe=false;


          if(menu.length>0){
               for (var i in menu) 
              {

                    if(menu[i].id==$("#select_id").val()){

                      menu[i].marca=$("#marca").val();
                      menu[i].color=$("#color").val();
                      menu[i].placa=$("#placa").val();
                      menu[i].uso_personal=$("#uso_personal").val();
                      menu[i].anio=$("#anio").val();
                      menu[i].clase_vehiculo=$("#clase_vehiculo").text();
                      menu[i].clase_vehiculo_id=$("#clase_vehiculo").val();
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
              var claseVehiculo=$("#clase_vehiculo").text();
              var clase_vehiculo_id = $("#clase_vehiculo").val();
              var buscar=document.getElementById("clase_vehiculo").value;
              var miAuto = new Object();

              miAuto["id"]=menu.length+1;
              miAuto["marca"] = marca;
              miAuto["color"] = color;
              miAuto["placa"] = placa;
              miAuto["uso_personal"] = usoPersonal;
              miAuto["anio"] = anio;
              miAuto["clase_vehiculo"] = claseVehiculo;
              miAuto["clase_vehiculo_id"] = clase_vehiculo_id;
               
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
                      
                         return '<input type="checkbox" checked="true" name="idprov[]" value="' + $('<div/>').text(data).html() + '">';
                       } 
                    
                  }],
                      'order': [[1, 'asc']]


              }); 

        
       
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
                     '<th>Accion</th>'+
                 '</tr>'+
              '</thead>'; 
         
        for (var i in menu) 
        {
        
       tabla += '<tr data-id={"id":"'+menu[i].id+'","marca":"'+menu[i].marca+'","color":"'+menu[i].color+'","placa":"'+menu[i].placa+'","uso_personal":"'+menu[i].uso_personal+'","anio":"'+menu[i].anio+'","clase_vehiculo":"'+menu[i].clase_vehiculo_id+'"}><td style="display:none"></td>'
        +'<td>'+menu[i].marca+'<input name="marca" value="'+menu[i].marca+'" type="hidden" id="marca" class="marca" /></td>'
        +'<td>'+menu[i].color+'<input name="color" value="'+menu[i].color+'" type="hidden" id="color" class="color" /></td>' 
        +'<td>'+menu[i].placa+'<input name="placa" value="'+menu[i].placa+'" type="hidden" id="placa" class="placa" /></td>'
        +'<td><input name="uso_personal" value="'+menu[i].uso_personal+'" type="hidden" id="uso_personal" class="uso_personal" />'+menu[i].uso_personal+'</td>'
        +'<td>'+menu[i].anio+' <input name="anio" value="'+menu[i].anio+'" type="hidden" id="anio" class="anio" /></td>'
        +'<td >'+menu[i].clase_vehiculo+'<input name="clase_vehiculo_id" value="'+menu[i].clase_vehiculo_id+'" type="hidden" id="clase_vehiculo_id" class="clase_vehiculo_id" /></td>'
         +'<td><button type="button"  class="btn btn-primary btn_editVehiculos" >cerrar</button> </td>'
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

         $("#select_id").val(pacienteDatos.id);
         $("#marca").val(pacienteDatos.marca);
         $("#color").val(pacienteDatos.color);
         $("#placa").val(pacienteDatos.placa);
         $("#uso_personal").val(pacienteDatos.uso_personal);
         $("#anio").val(pacienteDatos.anio);
         $("#clase_vehiculo").val(pacienteDatos.clase_vehiculo);
         
              

         /*var fila = $(this).parents('tr');
         var $row = $(this).closest("tr");
         var id=  $(this).closest('tr.data-uid').find('.parent').val();
             $tds = $row.find("td");
         var cadena = JSON.stringify($(this).parents('tr').data('uid'));
          //console.log(id);
         var pacienteDatos = eval('(' + cadena + ')');*/
          
        //console.log($(this).parents('tr'));
        // tabla=dibujatabla(menu);

         
    
       // $("#tbl_vehiculo").val(tabla);
      


       }); 
}        
     $("#btn_guardar  ").click(function (event) {
      var nombre=$("#nombre").val();
      var apellido=$("#apellido").val();
      var cedula=$("#cedula").val();
      var telefono=$("#telefono").val();
      var movil=$("#movil").val();
      var correo=$("#correo").val();
      var direccion=$("#direccion").val();
      
      var objTable = $("#automovil").DataTable();
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


                    var objVehiculo = new Object();
                    objVehiculo["marca"] = marca;
                    objVehiculo["color"] = color;
                    objVehiculo["placa"] = placa;
                    objVehiculo["uso_personal"] = usoPersonal;
                    objVehiculo["anio"] = anio;
                    objVehiculo["clase_vehiculo_id"] = clase_vehiculo_id;

        lstClienteVehiculo.push(objVehiculo);
        
      });

        
        console.log(objCiente);
         $.ajax({
                    url: '{{ url('/ingresoClienteVehiculo') }}',
                    type: 'post',
                    data: {'lstVehiculos':lstClienteVehiculo, 'cliente': objCiente},
                     beforeSend: function(data){
                          },
                     success: function(data) {  
                        console.log(data);
                        //window.location.reload(true); 
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    }  

                });   
          


      $(':checkbox', objTable.rows().nodes()).each(function(){             
                    if($(this).is('input[name="idprov[]"]:checked')){
                      
                   }         
      });



    var t = document.getElementById("automovil");
    d = t.getElementsByTagName("tr");

      $(':checkbox', objTable.rows().nodes()).each(function(){             
          valor = $(this).html();
          console.log(valor);
    });


    objTable.rows({search:'applied'}).every( function ( rowIdx, tableLoop, rowLoop ) {
     idpersona =  parseFloat($(this).parent().parent().find(".anio").val());
        var rowNode = this.node();
     
            $(rowNode).find("td:visible").each(function (){
     
                      var cellData = $(this).text();
                      //do something with the cell data.
        
               });
    });



     });
  });   
 </script>  
@endsection
