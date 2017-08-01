<?php

namespace App\Http\Controllers\Reporte;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Entidades\ServiciosCliente;


class ReporteServiciosController extends Controller
{
    

	 public function index(){
      
       return view('Reporte.reporteServicios');                 

    }

    public function cargarPorFechaServicios(Request $request){
      

	    if($request->fechaInicio!=null ||    $request->fechaFin!=null){
			         				       
	        $lstServiciosCliente= ServiciosCliente::cargarPorFechaServicios($request->fechaInicio, $request->fechaFin);
	        return $lstServiciosCliente;

   
           
				        

	    }
    

    }


    



}
