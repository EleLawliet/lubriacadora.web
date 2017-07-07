<?php

namespace App\Http\Controllers\Referencial;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Entidades\ClaseVehiculo;

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
       
          return view('Referencial.clienteVehiculo', compact('lstClaseVehiculo'));
    }
}
