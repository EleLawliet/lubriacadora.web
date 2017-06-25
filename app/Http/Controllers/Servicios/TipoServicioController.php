<?php

namespace App\Http\Controllers\Servicios;

use Illuminate\Http\Request;
use App\Entidades\TipoServicio;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class TipoServicioController extends Controller
{
    public function index(){
       $lstTipoServicio= TipoServicio::cargarTipoServicios();
         return view('Servicios.tipoServicio', compact('lstTipoServicio'));                 

    }
}
