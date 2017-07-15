
@extends('layouts.menu')

@section('content')

<div class="container">

  <div class="page-header">
              <h1>
                Tipo Servicios
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  mantenimiento 
                </small>
              </h1>
            </div><!-- /.page-header -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingreso Tipo Servicio</div>

                <div class="panel-body">

               
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
                       
                    <div class="form-group ">
                                <label for="" class="col-xs-12 col-sm-3 control-label no-padding-right">Tipo servicio</label>

                    <div class="col-xs-12 col-sm-5">
                      <span class="block input-icon input-icon-right">
                        <input name="tipoServicio" type="text" id="tipoServicio" class="width-100" />
                       
                      </span>
                    </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Estado</label>

                      <div class="col-md-5">
                        <select id="estado" name="estado" class="form-control" data-placeholder="Click to Choose...">

                          <option value="Seleccione...  ">&nbsp;</option>
                           @foreach($lstEstado as $item) 
                                        <option  value="{{$item->estado_id}}">{{$item->nombre}}</option> 
                           @endforeach
                        </select>
                      </div>
                    </div>   
                    <div class="form-group "> 
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                <br><button class ="btn btn-primary" type="submit"  > GUARDAR </button> 
                                </div>
                                
                          </div> 
                  </form>
                   <table id="tblMateria" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>
                            <tr>  
                                 <th>&nbsp;&nbsp;Materia</th>
                                  <th>&nbsp;&nbsp;Estado</th>
                                 <th>Acción</th>
                             </tr>
                          </thead>  
                          <tbody>    
                            @foreach($lstTipoServicio as $selec )
                                <tr data-id="{{$selec}}">

                                   <td>&nbsp;&nbsp;{{$selec->nombre}} </td>
                                   <td>&nbsp;&nbsp;{{$selec->estado->nombre}} </td>
                                    <td>&nbsp;&nbsp;
                          <a class="fa fa-check seleccion btn_select" type="button" title="seleccione" >  </a>         </td> 
                                 
                               </tr>
                            @endforeach
                          </tbody>
                </table>    
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

      $(".btn_select").click(function (event) {
  
         var fila = $(this).parents('tr');
         var cadena = JSON.stringify(fila.data('id'));
         var pacienteDatos = eval('(' + cadena + ')');

         $("#tipoServicio").val(pacienteDatos.nombre);
         $("#estado").val(pacienteDatos.estado.estado_id);
         $("#tipo_servicio_id").val(pacienteDatos.tipo_servicio_id);
          console.log(pacienteDatos);
            

     });  
        
        
       
     
     
});
     
 </script>  
@endsection
