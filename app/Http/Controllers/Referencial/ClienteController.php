<?php

namespace App\Http\Controllers\Referencial;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Entidades\ClaseVehiculo;
use App\Entidades\Cliente;
use App\Entidades\Vehiculo;
use App\Entidades\Estado;
use App\Entidades\ClienteVehiculo;
use Carbon\Carbon;
use Response;
use CollectionPHP;

use Illumin;
use Illuminate\Support\Collection as Collection;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $lstClaseVehiculo=ClaseVehiculo::all();
           $lstEstado=Estado::all();
         /* $lstVehiculo=ClienteVehiculo::buscarClienteVeiculo(50);
           
          $lstVehiculos=  Array();
           for($d=0; $d <count($lstVehiculo); $d++){
            

            
            $lstVehiculos[$d]['vehiculo']=array($lstVehiculo[$d]['vehiculo']);

           
         }

       //return $lstVehiculos->toJson();

           //  dd( $lstVehiculos);
        return Response::json($lstVehiculos, 200);
       //  return Response::json($response, $statusCode);
*/
          return view('Referencial.clienteVehiculo', compact('lstClaseVehiculo','lstEstado'));
    }

    public function ingresoClienteVehiculo(Request $request){

         try { 

         if((empty($request->cliente_id)) || $request->cliente_id==null){    


                $cliente= new Cliente();
                $lstcliente=$request->cliente;
                
               
                  for($i=0; $i<count($lstcliente); $i++){    

                        
                        $objCliente = new Cliente();
                        $objCliente->nombre=$lstcliente['nombre'];
                        $objCliente->apellido=$lstcliente['apellido'];
                        $objCliente->cedula=$lstcliente['cedula'];
                        $objCliente->telefono=$lstcliente['telefono'];
                        $objCliente->movil=$lstcliente['movil'];
                        $objCliente->correo=$lstcliente['correo'];
                        $objCliente->direccion=$lstcliente['direccion'];
                        $objCliente->fecha_registro=Carbon::now();
                        $objCliente->estado_id=Estado::$estadoActivo;
                         
                }

                 $objCliente->save();

                $lstVehiculo= new Vehiculo();
                $lstVehiculo=$request->lstVehiculos;
                $ciente_id=$objCliente->cliente_id;
                 
                
                for($d=0; $d <count($lstVehiculo); $d++){
                    

                    $objVehiculo= new Vehiculo();
                    $objVehiculo->clase_vehiculo_id=$lstVehiculo[$d]['clase_vehiculo_id'];
                    $objVehiculo->estado_id=$lstVehiculo[$d]['estado_id'];
                    $objVehiculo->marca=$lstVehiculo[$d]['marca'];
                    $objVehiculo->color=$lstVehiculo[$d]['color'];
                    $objVehiculo->placa=$lstVehiculo[$d]['placa'];
                    $objVehiculo->uso_personal=$lstVehiculo[$d]['uso_personal'];
                    $objVehiculo->anio=$lstVehiculo[$d]['anio'];
                    $objVehiculo->fecha_ingreso=Carbon::now();
                    $objVehiculo->usuario_ingreso=Auth::user()->id;
                    $objVehiculo->save();


                    $objClienteVehiculo = new  ClienteVehiculo();
                    $objClienteVehiculo->cliente_id=$objCliente->cliente_id;
                    $objClienteVehiculo->vehiculo_id=$objVehiculo->vehiculo_id;
                    $objClienteVehiculo->estado_id=$lstVehiculo[$d]['estado_id'];
                    $objClienteVehiculo->fecha_ingreso=Carbon::now();
                    $objClienteVehiculo->usuario_ingreso=Auth::user()->id;
                    $objClienteVehiculo->save();

                }
            
         
        }else{

               $cliente= new Cliente();
               $cliente=$request->cliente;
                  for($i=0; $i <count($cliente); $i++){    
                        $objCliente = Cliente::find($request->cliente_id);
                        $objCliente->nombre=$cliente['nombre'];
                        $objCliente->apellido=$cliente['apellido'];
                        $objCliente->cedula=$cliente['cedula'];
                        $objCliente->telefono=$cliente['telefono'];
                        $objCliente->movil=$cliente['movil'];
                        $objCliente->correo=$cliente['correo'];
                        $objCliente->direccion=$cliente['direccion'];
                        $objCliente->fecha_registro=Carbon::now();
                        $objCliente->estado_id=Estado::$estadoActivo;                      
                }

                $objCliente->save();

                $lstVehiculo= new Vehiculo();
                $lstVehiculo=$request->lstVehiculos;

                
                 $objClienteVehiculo= ClienteVehiculo::buscarClienteVehiculoXId($objCliente->cliente_id);

                 foreach ($objClienteVehiculo as $key ) {

                    for($d=0; $d <count($lstVehiculo); $d++){
                            
                            if($key->vehiculo_id==$lstVehiculo[$d]['vehiculo_id']){

                                $objVehiculo= new Vehiculo();
                                $objVehiculo=  Vehiculo::find($lstVehiculo[$d]['vehiculo_id']);

                                $objVehiculo->clase_vehiculo_id=$lstVehiculo[$d]['clase_vehiculo_id'];
                                $objVehiculo->estado_id=$lstVehiculo[$d]['estado_id'];
                                $objVehiculo->marca=$lstVehiculo[$d]['marca'];
                                $objVehiculo->color=$lstVehiculo[$d]['color'];
                                $objVehiculo->placa=$lstVehiculo[$d]['placa'];
                                $objVehiculo->uso_personal=$lstVehiculo[$d]['uso_personal'];
                                $objVehiculo->anio=$lstVehiculo[$d]['anio'];
                                $objVehiculo->fecha_modificacion=Carbon::now();
                                $objVehiculo->usuario_modificacion=Auth::user()->id;
                                $objVehiculo->save();

                                 $obClienteVehiculo=  ClienteVehiculo::find($key->cliente_vehiculo_id);
                                 $obClienteVehiculo->estado_id=$lstVehiculo[$d]['estado_id'];
                                 $obClienteVehiculo->save();

                                break;

                            } 



                    }


        
               }    

            for($d=0; $d <count($lstVehiculo); $d++){

                   if($lstVehiculo[$d]['cliente_vehiculo_id']=="" || $lstVehiculo[$d]['cliente_vehiculo_id']==null){

                                        $objVehiculo= new Vehiculo();
                                        $objVehiculo->clase_vehiculo_id=$lstVehiculo[$d]['clase_vehiculo_id'];
                                        $objVehiculo->estado_id=$lstVehiculo[$d]['estado_id'];
                                        $objVehiculo->marca=$lstVehiculo[$d]['marca'];
                                        $objVehiculo->color=$lstVehiculo[$d]['color'];
                                        $objVehiculo->placa=$lstVehiculo[$d]['placa'];
                                        $objVehiculo->uso_personal=$lstVehiculo[$d]['uso_personal'];
                                        $objVehiculo->anio=$lstVehiculo[$d]['anio'];
                                        $objVehiculo->fecha_ingreso=Carbon::now();
                                        $objVehiculo->usuario_ingreso=Auth::user()->id;
                                        $objVehiculo->save();

                                        $objClienteVehiculo = new  ClienteVehiculo();
                                        $objClienteVehiculo->cliente_id=$objCliente->cliente_id;
                                        $objClienteVehiculo->vehiculo_id=$objVehiculo->vehiculo_id;
                                        $objClienteVehiculo->estado_id=$lstVehiculo[$d]['estado_id'];
                                        $objClienteVehiculo->fecha_ingreso=Carbon::now();
                                        $objClienteVehiculo->usuario_ingreso=Auth::user()->id;
                                        $objClienteVehiculo->save();
                                        break ;
                                }
                }                 

        }      

       }catch(\Exception $e){
                    Session::flash('message',$e->getMessage());
                   return redirect()->back();
           } 
        

        Session::flash('message', 'Se ha guardado con exíto. ');

    }


   public function cargarPorCedula(Request $request){

        $objCliente= Cliente::buscarCedula($request->cedula);


        if($objCliente!=null || $objCliente!=""){

                $objClienteVehiculo= ClienteVehiculo::buscarClienteVehiculoXId($objCliente->cliente_id);
                return $objClienteVehiculo;

        }else{
            return $objClienteVehiculo=new ClienteVehiculo();
        }

   }
    
}
