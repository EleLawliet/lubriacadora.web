@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   <table id="tblMateria" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>
                            <tr>  
                                 <th>&nbsp;&nbsp;Materia</th>
                                 
                                 <th></th>
                             </tr>
                          </thead>  
                          <tbody>    
                            @foreach($lstTipoServicio as $selec)
                                <tr data-id="{{$selec}}">
                                   <td>&nbsp;&nbsp;{{$selec->nombre}} </td>
                                   
                                    <td>&nbsp;&nbsp;
                                        <a class="fa fa-check seleccion btn_select" type="submit" title="seleccione" >  </a> 
                                      
                                    </td>     
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
