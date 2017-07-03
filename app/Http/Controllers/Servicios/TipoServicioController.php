<?php

namespace App\Http\Controllers\Servicios;

use Illuminate\Http\Request;
use App\Entidades\TipoServicio;
use App\Entidades\Estado;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class TipoServicioController extends Controller
{
    public function index(){
       $lstTipoServicio= TipoServicio::cargarTipoServicios();
       $lstEstado= Estado::all();
         return view('Servicios.tipoServicio', compact('lstTipoServicio','lstEstado'));                 

    }

    public function  guardarTipoServicio(Request $request){
    	dd($request->all);

    }

    public function eliminaTipoServicio(Request $request){
      return $request->all();

    }
}
