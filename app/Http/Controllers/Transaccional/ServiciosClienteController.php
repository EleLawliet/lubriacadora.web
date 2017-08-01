<?php

namespace App\Http\Controllers\Transaccional;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Entidades\ClaseVehiculo;
use App\Entidades\ClaseVehiculoServicio;
use App\Entidades\Vehiculo;
use App\Entidades\Estado;
use App\Entidades\ServiciosCliente;
use App\Entidades\ClienteVehiculo;
use App\Entidades\Insumos;
use App\Entidades\DetServiciosCliente;
use App\Entidades\TipoTiempo;
use Carbon\Carbon;
use App\Entidades\TipoServicio;
use Response;
use CollectionPHP;

use Illumin;
use Illuminate\Support\Collection as Collection;

class ServiciosClienteController extends Controller
{

	  public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $lstClaseVehiculo=ClaseVehiculo::all();
        $lstEstado=Estado::all();
        $lstInsumos=Insumos::cargarInsumos();
        $fecha=Carbon::now();
        
          return view('Transaccional.clienteVehiculo', compact('lstClaseVehiculo','lstEstado','lstInsumos','fecha')); 

    }

    public function buscarserviciosPorClaseVehiculo(Request $request){
    	
        $objClaseVehiculo= new Vehiculo();
        $objClaseVehiculo=Vehiculo::find($request->vehiculo_id);

        $lstClaseVehiculoServicio=ClaseVehiculoServicio::cargarPorClaseVehiculo($objClaseVehiculo->clase_vehiculo_id);       
        return $lstClaseVehiculoServicio; 

    }

    public function calculaServicos(Request $request){

        if($request->clase_vehiculo_servicio_id!=null &&  $request->vehiculo_id!=null){

                    $objClaseVehiculoServicio= new ClaseVehiculoServicio();
                    $objClaseVehiculoServicio= ClaseVehiculoServicio::find($request->clase_vehiculo_servicio_id);
                    $objDetServiciosCliente= new DetServiciosCliente();

                    $objVehiculo=Vehiculo::find($request->vehiculo_id);

                    $tipo_Tiempo_km=TipoTiempo::$km;


                            if($objClaseVehiculoServicio->tipo_tiempo_id==$tipo_Tiempo_km){

                                if($request->Kilometraje_inicio!=null){

                             $objDetServiciosCliente->kilometraje_sustitucion=$request->Kilometraje_inicio+$objClaseVehiculoServicio->tiempo_servicio;
                                }

                                 
                                if($objVehiculo->uso_personal=="S"){

                                    if($objClaseVehiculoServicio->dias_personal!=null){
                                    
                                    $objFechaHoy=Carbon::now()->addDay($objClaseVehiculoServicio->dias_personal);    
                                    $objDetServiciosCliente->fecha_sustitucion=$objFechaHoy;
                                 }
                                }
                                if($objVehiculo->uso_personal=="N"){

                                     if($objClaseVehiculoServicio->dias_trabajo!=null){

                                    $objFechaHoy=Carbon::now()->addDay($objClaseVehiculoServicio->dias_trabajo);    
                                    $objDetServiciosCliente->fecha_sustitucion=$objFechaHoy;
                                }

                                }        

                            }
                     
                     $tipo_Tiempo_mes=TipoTiempo::$mes;
                    if($objClaseVehiculoServicio->tipo_tiempo_id==$tipo_Tiempo_mes){


                         $objFechaHoy=Carbon::now()->addMonths($objClaseVehiculoServicio->tiempo_servicio);
                         $objDetServiciosCliente->fecha_sustitucion=$objFechaHoy;

                        if($objVehiculo->uso_personal=="S"){

                                if($objClaseVehiculoServicio->dias_personal!=null){

                                $objFechaHoy=Carbon::now()->addDay($objClaseVehiculoServicio->dias_personal);    
                                $objDetServiciosCliente->fecha_sustitucion=$objFechaHoy;

                             }
                        }

                        if($objVehiculo->uso_personal=="N"){

                             if($objClaseVehiculoServicio->dias_trabajo!=null){

                               $objFechaHoy=Carbon::now()->addDay($objClaseVehiculoServicio->dias_trabajo);    
                                $objDetServiciosCliente->fecha_sustitucion=$objFechaHoy;

                             }

                        }  

                    }

                     $cambios=TipoTiempo::$cambios;
                    if($objClaseVehiculoServicio->tipo_tiempo_id==$cambios){

                         $objClienteVehiculo=ClienteVehiculo::buscarPorclienteYvehiculo($request->cliente_id, $request->vehiculo_id);


                         $objDetServClient=DetServiciosCliente::buscarServiciosClienteXclaseServicio($objClienteVehiculo->cliente_vehiculo_id, $objClaseVehiculoServicio->clase_vehiculo_servicio_id, $objClaseVehiculoServicio->tiempo_servicio);


                         if(count($objDetServClient)>0){

                             $objDetServiciosCliente->cantidad_cambio=1;
                             $objDetServiciosCliente->fecha_sustitucion=null;
                             $objDetServiciosCliente->kilometraje_sustitucion=null;
                             $objTipoServicio= TipoServicio::find($objClaseVehiculoServicio->tipo_servicio_id);
                             $objDetServiciosCliente['mensaje']="Servicio ".$objTipoServicio->nombre." se debe ingresar cada ".              $objClaseVehiculoServicio->tiempo_servicio." cambios de aceite.";

                         }else{

                            $objDetServiciosCliente->cantidad_cambio=1;
                            $objDetServiciosCliente->fecha_sustitucion=null;
                            $objDetServiciosCliente->kilometraje_sustitucion=null;
                            
                         }

                    }
 

            return $objDetServiciosCliente; 

        }   

    }

     public function ingresoServiciosCliente(Request $request){

        

        $objServiciosCliente= new ServiciosCliente();
        $objServiciosCliente->cliente_id=$request->cliente_id;
        $objServiciosCliente->descripcion=$request->descripcion;
        $objServiciosCliente->fecha_ingreso=Carbon::now();
        $objServiciosCliente->estado_id=Estado::$estadoActivo;
        $objServiciosCliente->usuario_ingreso=Auth::user()->id;
        $objServiciosCliente->save();
        

        $lstDetServicioCliente=$request->lstDetServicioCliente;

        for($i=0; $i<count($lstDetServicioCliente); $i++){    

             $objClienteVehiculo= new ClienteVehiculo(); 
             $objClienteVehiculo=ClienteVehiculo::buscarPorclienteYvehiculo($request->cliente_id, $lstDetServicioCliente[$i]['vehiculo_id']);

            $objClaseVehiculoServicio=ClaseVehiculoServicio::find($lstDetServicioCliente[$i]['clase_vehiculo_servicio_id']);

            if($objClaseVehiculoServicio->tipo_servicio_id==TipoServicio::$aceiteSintetico || $objClaseVehiculoServicio->tipo_servicio_id==TipoServicio::$aceiteSemiSintetico || $objClaseVehiculoServicio->tipo_servicio_id==TipoServicio::$convencional){

                //solo obtengo la clase vehiculo
               
                     $lstClaseVehServCajaRetro=ClaseVehiculoServicio::buscartipoServicioXusados(TipoTiempo::$cambios
                    ,$objClaseVehiculoServicio->clase_vehiculo_id);

                    if(!empty($lstClaseVehServCajaRetro)){

                            foreach ($lstClaseVehServCajaRetro as $objClaseVehServCajaRetro) {

                                 $lstDetServiciosCliente=DetServiciosCliente::buscarPorClienteYservicio($objClienteVehiculo->cliente_vehiculo_id,
                                    $objClaseVehServCajaRetro->clase_vehiculo_servicio_id);



                                    if(!empty($lstDetServiciosCliente)){

                                            foreach($lstDetServiciosCliente  as $objSelect){

                                                if($objSelect->servicios_cliente_id!=$objServiciosCliente->servicios_cliente_id){

                                                        $objDetServiciosCliente= new  DetServiciosCliente();
                                                        $objDetServiciosCliente= DetServiciosCliente::find($objSelect->det_servicios_cliente_id);

                                                        if($objDetServiciosCliente->cantidad_cambio<$objClaseVehServCajaRetro->tiempo_servicio){
                                                            $objDetServiciosCliente->cantidad_cambio=$objDetServiciosCliente->cantidad_cambio+1;
                                                            $objDetServiciosCliente->fecha_sustitucion=$lstDetServicioCliente[$i]['fecha_sustitucion'];
                                                            $objDetServiciosCliente->save();

                                                            }

                                                 }           


                                            } 


                                    }       

                            }   

                    }         
                     
            }


                    $objDetServiciosCliente= new  DetServiciosCliente();
                    $objDetServiciosCliente->clase_vehiculo_servicio_id=$lstDetServicioCliente[$i]['clase_vehiculo_servicio_id'];
                    $objDetServiciosCliente->cliente_vehiculo_id=$objClienteVehiculo->cliente_vehiculo_id;
                    $objDetServiciosCliente->insumos_id=$lstDetServicioCliente[$i]['insumos_id'];
                    $objDetServiciosCliente->estado_id=Estado::$estadoActivo;
                    $objDetServiciosCliente->servicios_cliente_id=$objServiciosCliente->servicios_cliente_id;
                    $objDetServiciosCliente->kilometraje_inicio=$lstDetServicioCliente[$i]['Kilometraje_inicio'];
                    $objDetServiciosCliente->kilometraje_sustitucion=$lstDetServicioCliente[$i]['kilometraje_sustitucion'];
                    $objDetServiciosCliente->fecha_inicio=Carbon::now();
                    $objDetServiciosCliente->fecha_sustitucion=$lstDetServicioCliente[$i]['fecha_sustitucion'];
                    $objDetServiciosCliente->cantidad_cambio=$lstDetServicioCliente[$i]['cantidad_cambio'];
                    $objDetServiciosCliente->save();



             Session::flash('message', 'Se genero la solicitud de servicio N# '.$objServiciosCliente->servicios_ciente_id.'');
                


        }

       
    }

         public function cargarPorSolicitudClienetVehiculo(Request $request){

            $objServiciosCliente=ServiciosCliente::buscarPorservicioCliente($request->servicios_ciente_id);

            return $objServiciosCliente;


         }
    
     

}
