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
          return view('Referencial.clienteVehiculo', compact('lstClaseVehiculo'));
    }

    public function ingresoClienteVehiculo(Request $request){

   
        
        $cliente=$request->cliente;
        
        
          for($d=0; $d <count($cliente); $d++){    

             
                 $objCliente = new Cliente();
                $objCliente->nombre=$cliente['nombre'];
                $objCliente->apellido=$cliente['apellido'];
                $objCliente->cedula=$cliente['cedula'];
                $objCliente->telefono=$cliente['telefono'];
                $objCliente->movil=$cliente['movil'];
                $objCliente->correo=$cliente['correo'];
                $objCliente->direccion=$cliente['direccion'];
                $objCliente->fecha_registro=Carbon::now();
                $objCliente->estado_id=Estado::$estadoActivo;
                $objCliente->save();
        }
        $lstVehiculo= new Vehiculo();
        $lstVehiculo=$request->lstVehiculos;

         
        
        for($d=0; $d <count($lstVehiculo); $d++){
            


            $objVehiculo= new Vehiculo();

            $objVehiculo->clase_vehiculo_id=$lstVehiculo[$d]['clase_vehiculo_id'];
            $objVehiculo->estado_id=Estado::$estadoActivo;
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
            $objClienteVehiculo->estado_id=Estado::$estadoActivo;
            $objClienteVehiculo->fecha_ingreso=Carbon::now();
            $objClienteVehiculo->usuario_ingreso=Auth::user()->id;
            $objClienteVehiculo->save();

        }
            
         
    }


   public function cargarPorCedula(Request $request){

        $objCliente= Cliente::buscarCedula($request->cedula);
        $objClienteVehiculo= ClienteVehiculo::buscarClienteVeiculoXId($objCliente->cliente_id);
        return $objClienteVehiculo;

   }
    
}
