<?php

namespace App\Http\Controllers\Referencial;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Entidades\Estado;
use App\Entidades\ClaseVehiculo;
use App\Entidades\TipoServicio;
use App\Entidades\TipoTiempo;
use App\Entidades\ClaseVehiculoServicio;
use DB;
class ClaseVehiculoServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {

          $lstClaseVehiculo=ClaseVehiculo::all();
          $lstTipoTiempo=TipoTiempo::all();
          $lstTipoServicio=TipoServicio::all();
          $lstEstado=Estado::all();
          $lstClaseVehiculoServicio=ClaseVehiculoServicio::buscarClaseVehiculoServicio();
          return view('Referencial.claseVehiculoServicio', compact('lstClaseVehiculo','lstTipoTiempo','lstTipoServicio','lstClaseVehiculoServicio','lstEstado'));

    }

    public function guardarClaseServicio(Request $request){

    	 try { 

    	 		if((empty($request->clase_vehiculo_servicio_id)) ||  $request->clase_vehiculo_servicio_id==null){

		    	 	$objClaseVehiculoServicio= new ClaseVehiculoServicio();
		    	 	$objClaseVehiculoServicio->tipo_servicio_id=$request->tipo_servicio_id;
			        $objClaseVehiculoServicio->clase_vehiculo_id=$request->clase_vehiculo_id;
			        $objClaseVehiculoServicio->estado_id=$request->estado_id;
			        $objClaseVehiculoServicio->tipo_tiempo_id=$request->tipo_tiempo_id;
			        $objClaseVehiculoServicio->dias_personal=$request->dias_personal;
			        $objClaseVehiculoServicio->dias_trabajo=$request->dias_trabajo;
			        $objClaseVehiculoServicio->tiempo_servicio=$request->tiempo_servicio;
			        $objClaseVehiculoServicio->save();
		    	
			     }else{

			     	$objClaseVehiculoServicio= new ClaseVehiculoServicio();
			     	$objClaseVehiculoServicio= ClaseVehiculoServicio::find($request->clase_vehiculo_servicio_id);
		    	 	$objClaseVehiculoServicio->tipo_servicio_id=$request->tipo_servicio_id;
			        $objClaseVehiculoServicio->clase_vehiculo_id=$request->clase_vehiculo_id;
			        $objClaseVehiculoServicio->estado_id=$request->estado_id;
			        $objClaseVehiculoServicio->tipo_tiempo_id=$request->tipo_tiempo_id;
			        $objClaseVehiculoServicio->dias_personal=$request->dias_personal;
			        $objClaseVehiculoServicio->dias_trabajo=$request->dias_trabajo;
			        $objClaseVehiculoServicio->tiempo_servicio=$request->tiempo_servicio;
			        $objClaseVehiculoServicio->save();

			     }
    	 		


    	 	 }catch(\Exception $e){
                    Session::flash('message',$e->getMessage());
                   return redirect()->back();
           } 
        

          Session::flash('message', 'Se ha guardado con exíto. ');
         return redirect()->back();

    }

    

    public function validaClaseVehiculoXtipoServicio(Request $request){


    	$ClaseVehiculoServicio=ClaseVehiculoServicio::ValidaClaseVehiculoServicio($request->tipo_servicio_id , $request->clase_vehiculo_id, $request->clase_vehiculo_servicio_id);

    	return $ClaseVehiculoServicio;


    }
}
