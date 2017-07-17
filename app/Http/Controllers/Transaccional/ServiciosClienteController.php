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
use App\Entidades\ClienteVehiculo;
use App\Entidades\Insumos;
use Carbon\Carbon;
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
        $lstInsumos=Insumos::all();
      
          return view('Transaccional.clienteVehiculo', compact('lstClaseVehiculo','lstEstado','lstInsumos')); 

    }

    public function buscarserviciosPorClaseVehiculo(Request $request){
    	
        $objClaseVehiculo=Vehiculo::find($request->vehiculo_id);
        $lstClaseVehiculoServicio=ClaseVehiculoServicio::cargarPorClaseVehiculo($objClaseVehiculo->clase_vehiculo_id);       
        return $lstClaseVehiculoServicio; 

    }



}
