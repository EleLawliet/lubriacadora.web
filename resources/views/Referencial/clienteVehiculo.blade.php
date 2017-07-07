
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
                        <input name="nombre" type="text" id="Nombre" class="width-100" />
                       
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
                       
                      </span>
                    </div>
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

@endsection
@section("scripts")
<script type="text/javascript">
 
$(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#tblMateria').DataTable({
                responsive: true
        });
    
 /*       
 $(".btn_select").click(function (event) {
  
         var fila = $(this).parents('tr');
         var cadena = JSON.stringify(fila.data('id'));
         var pacienteDatos = eval('(' + cadena + ')');

         $("#tipoServicio").val(pacienteDatos.nombre);
         $("#estado").val(pacienteDatos.estado.estado_id);

          console.log(pacienteDatos);
           $.ajax({
                    url: '{{ url('/cambioEstado') }}',
                    type: 'post',
                    data: {'tipoServicioId':pacienteDatos.tipo_servicio_id},
                     beforeSend: function(data){
                          },
                     success: function(data) {  
                        console.log(data);
                        window.location.reload(true); 
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    }  

                });   
            
     }); */
      var menu=[];
      $("#btn_agregar").click(function (event) {
  
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
        miAuto["marca"] = marca;
        miAuto["color"] = color;
        miAuto["placa"] = placa;
        miAuto["uso_personal"] = usoPersonal;
        miAuto["anio"] = anio;
        miAuto["clase_vehiculo"] = claseVehiculo;
        miAuto["clase_vehiculo_id"] = clase_vehiculo_id;
         
         menu.push(miAuto);
         var tabla = '<table id="automovil" class="table table-striped table-bordered" >'
        tabla+= '<thead>'+
                '<tr>'+
                     '<th>Marca</th>'+
                      '<th>Color</th>'+
                     '<th>Placa</th>'+
                     '<th>Uso Personal</th>'+
                     '<th>Anio</th>'+
                     '<th>Clase Vehiculo</th>'+
                 '</tr>'+
              '</thead>'; 
         
        for (var i in menu) 
        {
        
         tabla += '<tr>'
         +'<td>'+menu[i].marca+'</td>'
        +'<td>'+menu[i].color+'</td>' 
        +'<td>'+menu[i].placa+'</td>'
        +'<td>'+menu[i].uso_personal+'</td>'
        +'<td>'+menu[i].anio+'</td>'
        +'<td>'+menu[i].clase_vehiculo+'<input name="clase_vehiculo_id" value="'+menu[i].clase_vehiculo_id+'" type="hidden" id="clase_vehiculo_id" class="width-100" />'+'</td></tr>';
        
        }
         
        tabla += '</table>'
        $("#tbl_vehiculo").val(tabla);
        document.getElementById('tbl_vehiculo').innerHTML = tabla; 
            

         $('#automovil').DataTable({
                responsive: true
        }); 



       
     });  
        
     $("#btn_guardar  ").click(function (event) {
      var nombre=$("#nombre").val();
      var apellido=$("#apellido").val();
      var apellido=$("#cedula").val();
      var apellido=$("#telefono").val();
      var apellido=$("#movil").val();
      var apellido=$("#correo").val();
      var apellido=$("#direcion").val();

    var objTable = $("#tbl_vehiculo").DataTable();

    var t = document.getElementById("tbl_vehiculo"),
    tableRows = t.getElementsByTagName("tr"),
    r = [], i, len, tds, j, jlen;

for ( i =0, len = tableRows.length; i<len; i++) {
    tds = tableRows[i].getElementsByTagName('td');
    for( j = 0, jlen = tds.length; j < jlen; j++) {
        r.push(tds[j]);
    }
}

    



    $("#tbl_vehiculo".rows().nodes()).each(function(){
          valor = $(this).html();
          console.log(valor);
    });


objTable.rows({search:'applied'}).every( function ( rowIdx, tableLoop, rowLoop ) {
 
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
