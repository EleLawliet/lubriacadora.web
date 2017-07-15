
@extends('layouts.menu')

@section('content')

<div class="container">

  <div class="page-header">
              <h1>
                Registro clase de servicio
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  Referencial 
                </small>
              </h1>
            </div><!-- /.page-header -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de clase vehiculo por servicio</div>

                <div class="">

               <br>
                <form class="form-horizontal" id="sample-form" name="formCuenta"  method="POST" enctype="multipart/form-data"  action="{{url('/guardarClaseServicio')}}" role="form">
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
                <input name="clase_vehiculo_servicio_id" type="hidden" id="clase_vehiculo_servicio_id" class="width-100" />
           <div class="col-sm-6">     
                   
                    <div class="form-group">
                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Clase Vehiculo</label>

                      <div class="col-xs-12 col-sm-8">
                         <select id="clase_vehiculo_id" name="clase_vehiculo_id" class="form-control" data-placeholder="Click to Choose...">

                          <option value="">&nbsp;</option>
                           @foreach($lstClaseVehiculo as $item) 
                                        <option  value="{{$item->clase_vehiculo_id}}">{{$item->nombre}}</option> 
                           @endforeach
                        </select>
                      </div>

                
                    </div>  

                    <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Dias Personal</label>

                    <div class="col-xs-12 col-sm-8">
                      <span class="block input-icon input-icon-right">
                        <input name="dias_personal" type="number" id="dias_personal" class="width-100" />
                        
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
              </div>
                    
                <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Tiempo Servicio</label>
                      
                    <div class="col-xs-11 col-sm-4">
                            <input name="tiempo_servicio" type="number" id="tiempo_servicio"  />
                    </div>

                    <div class="col-xs-11 col-sm-4">
                      <select id="tipo_tiempo_id" name="tipo_tiempo_id" class="form-control" data-placeholder="Click to Choose...">
                              <option value="">Segmento......</option>
                               @foreach($lstTipoTiempo as $item) 
                                            <option  value="{{$item->tipo_tiempo_id}}">{{$item->nombre}}</option> 
                               @endforeach
                      </select>
                    </div>     
              </div>

            

              

            </div>


                <div class="col-sm-5"> 


                <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state"> Servicio</label>

                        <div class="col-xs-12 col-sm-8">
                           <select id="tipo_servicio_id" name="tipo_servicio_id" class="form-control" data-placeholder="Click to Choose...">

                            <option value="">&nbsp;</option>
                             @foreach($lstTipoServicio as $item) 
                                          <option  value="{{$item->tipo_servicio_id}}">{{$item->nombre}}</option> 
                             @endforeach
                          </select>
                        </div>
                    </div>
              

              <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Dias Trabajo</label>

                    <div class="col-xs-12 col-sm-8">
                      <span class="block input-icon input-icon-right">
                        <input name="dias_trabajo" type="number" id="dias_trabajo" class="width-100" />
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
              </div>

                <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Estado</label>
                      
                   

                    <div class="col-xs-10 col-sm-8">
                      <select id="estado_id" name="estado_id" class="form-control" data-placeholder="Click to Choose...">
                              <option value="">Seleccione......</option>
                               @foreach($lstEstado as $item) 
                                            <option  value="{{$item->estado_id}}">{{$item->nombre}}</option> 
                               @endforeach
                      </select>
                    </div> 

                     
                    <br>   
                    
              </div>
           
              <div class="form-group"> 
                <div class="row"> 
                   <div class="col-xs-12 col-sm-4">
                           <button id="btn_guardar" class="btn btn-primary " type="button"  />  Guardar</button>
                           
                    </div>

                   <div class="col-xs-10 col-sm-4">  
                          <button id="btn_limpiar" class="btn btn-primary " type="button"  />  Limpiar</button> 
                    </div>
                </div>    

              </div>            
            </div>  

                   </div>       
                   
                   
                  </form>
                  
                      <table id="tblClaseVehiculo" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>
                            <tr>  
                                 <th>&nbsp;&nbsp;Clase Vehiculo</th>
                                  <th>&nbsp;&nbsp; servicio</th>
                                  <th>&nbsp;&nbsp;Tiempo servicio</th>
                                  <th>&nbsp;&nbsp;Segmento</th>
                                  <th>&nbsp;&nbsp;Dias personal</th>
                                  <th>&nbsp;&nbsp;Dias trabajo</th>
                                  <th>&nbsp;&nbsp;Estado</th>
                                 <th>Acción</th>
                             </tr>
                          </thead>  
                          <tbody>    
                            @foreach($lstClaseVehiculoServicio as $selec )
                                <tr data-id="{{$selec}}">

                                   <td>&nbsp;&nbsp;{{$selec->claseVehiculo->nombre}} </td>
                                   <td>&nbsp;&nbsp;{{$selec->tipoServicio->nombre}} </td>
                                   <td>&nbsp;&nbsp;{{$selec->tiempo_servicio}} </td>
                                   <td>&nbsp;&nbsp;{{$selec->tipoTiempo->nombre}} </td>
                                   <td>&nbsp;&nbsp;{{$selec->dias_personal}} </td>
                                   <td>&nbsp;&nbsp;{{$selec->dias_trabajo}} </td>
                                   <td>&nbsp;&nbsp;{{$selec->estado->nombre}} </td>
                                    <td>&nbsp;&nbsp;
                          <a class="fa fa-pencil-square-o fa-2x btn_select" type="button" title="seleccione" >  </a>         </td> 
                                 
                               </tr>
                            @endforeach
                          </tbody>
                      </table>  

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

        $('#tblClaseVehiculo').DataTable({
                responsive: true
        });



          $("#btn_guardar").click(function (event) {

                 $('#mensajes').removeClass('alert alert-danger');
       $('#mensajes').removeClass('alert alert-success');
       $('#mensajes').removeClass('alert alert-info');
       $('#mensajes').addClass('hide');
       $('#mensajesController').removeClass('alert alert-danger');
       $('#mensajesController').removeClass('alert alert-success');
       $('#mensajesController').removeClass('alert alert-info');
       $('#mensajesController').addClass('hide');       

                var bValid = true;  
                var clase_vehiculo_id=$("#clase_vehiculo_id").val();
                //var dias_personal=$("#dias_personal").val();
                var tiempo_servicio=$("#tiempo_servicio").val();
                var tipo_tiempo_id=$("#tipo_tiempo_id").val();
                var tipo_servicio_id=$("#tipo_servicio_id").val();
                var estado_id=$("#estado_id").val();
              
                 var clase_vehiculo_servicio_id=$("#clase_vehiculo_servicio_id").val();
                

                var combo = document.getElementById("clase_vehiculo_id");
                var nombre_clase_vehiculo = combo.options[combo.selectedIndex].text;
                var combo2 = document.getElementById("tipo_servicio_id");
                var nombre_tipo_servicio = combo2.options[combo2.selectedIndex].text;
                           

                bValid = bValid && validarCampoLleno(clase_vehiculo_id, 'Clase vehiculo');
                bValid = bValid && validarCampoLleno(tipo_servicio_id, 'Tipo servicio');
               // bValid = bValid && validarCampoLleno(dias_personal, 'Dias Personal');
               // bValid = bValid && validarCampoLleno(dias_trabajo, 'Dias Trabajo');
                bValid = bValid && validarCampoLleno(tiempo_servicio, 'Tiempo Servicio');
                bValid = bValid && validarCampoLleno(tipo_tiempo_id, 'Segmento');
                bValid = bValid && validarCampoLleno(estado_id, 'estado');
               

                  if (bValid == true){
                      $('#mensajes').removeClass('alert alert-danger');
                      $('#mensajes').addClass('hide');
                     

                       $.ajax({
                                url: '{{ url('/validaClaseVehiculoXtipoServicio') }}',
                                type: 'post',
                                data: {'clase_vehiculo_id':clase_vehiculo_id, 'tipo_servicio_id': tipo_servicio_id,                'clase_vehiculo_servicio_id':clase_vehiculo_servicio_id},
                                 beforeSend: function(data){
                                        $('#mensajes').removeClass('alert alert-danger');
                                        $('#mensajes').addClass('hide');
                                         

                                      },
                                 success: function(data) {  
                                    console.log(data);

                                    if(data.length==0)
                                    {
                                        document.formCuenta.submit();
                                    }else{
                                         mensajePersonalizado("", 'Ya se encontro la clase vehiculo '+nombre_clase_vehiculo+' con el servicio '+nombre_tipo_servicio+'.');
                                    }
                                   // window.location.reload(true); 
                                },
                                error: function ( xhr, status,error) {
                                 
                                    alert('Disculpe, existió un problema');
                                }  

                            });   

                     // 
                     
                  }




     });
      


   $("#btn_limpiar").click(function (event) {

     $("#clase_vehiculo_servicio_id").val("");
     $("#clase_vehiculo_id").val("");
     $("#dias_personal").val("");
     $("#tiempo_servicio").val("");
     $("#tipo_tiempo_id").val("");
     $("#tipo_servicio_id").val("");
     $("#dias_trabajo").val("");
     $("#estado_id").val("");

   });

   $(".btn_select").click(function (event) {

       $('#mensajes').removeClass('alert alert-danger');
       $('#mensajes').removeClass('alert alert-success');
       $('#mensajes').removeClass('alert alert-info');
       $('#mensajes').addClass('hide');
       $('#mensajesController').removeClass('alert alert-danger');
       $('#mensajesController').removeClass('alert alert-success');
       $('#mensajesController').removeClass('alert alert-info');
       $('#mensajesController').addClass('hide');                

        var fila = $(this).parents('tr');
         var cadena = JSON.stringify(fila.data('id'));
         var pacienteDatos = eval('(' + cadena + ')');
         console.log(pacienteDatos);
         
         $("#clase_vehiculo_servicio_id").val(pacienteDatos.clase_vehiculo_servicio_id);
         $("#clase_vehiculo_id").val(pacienteDatos.clase_vehiculo_id);
         $("#dias_personal").val(pacienteDatos.dias_personal);
         $("#tiempo_servicio").val(pacienteDatos.tiempo_servicio);
         $("#tipo_tiempo_id").val(pacienteDatos.tipo_tiempo_id);
         $("#tipo_servicio_id").val(pacienteDatos.tipo_servicio_id);
         $("#dias_trabajo").val(pacienteDatos.dias_trabajo);
         $("#estado_id").val(pacienteDatos.estado_id);
         
               

            
     }); 


     
    
 
    



  });   
 </script>  
@endsection
