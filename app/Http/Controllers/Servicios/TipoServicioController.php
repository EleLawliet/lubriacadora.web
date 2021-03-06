<?php

namespace App\Http\Controllers\Servicios;

use Illuminate\Http\Request;
use App\Entidades\TipoServicio;
use App\Entidades\Estado;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Validator;

use App\Entidades\Vehiculo;
class TipoServicioController extends Controller
{
    public function index(){
       $lstTipoServicio= TipoServicio::cargarTipoServicios();
      
       $lstEstado= Estado::all();
       return view('Servicios.tipoServicio', compact('lstTipoServicio','lstEstado'));                 

    }



    public function  guardarTipoServicio(Request $request){

    	$var_tipos_servicio_id=$request->tipo_servicio_id;

    	if($var_tipos_servicio_id){

    						$messages = [
						                'tipo_servicio.required' => 'Campo :attribute es requerido.',
						                'tipo_servicio.max' => 'Campo :attribute debe tener un tamaño de :max.',
						                'tipo_servicio.unique' => 'Campo :attribute ya se encuentra registrado.',	
							            ];

							            $validator = Validator::make($request->all(),[
							            'nombre' =>'required|max:255|unique:tipo_servicio,nombre,' . $request->tipo_servicio_id . ',tipo_servicio_id'              
							            ], $messages);

								            if ($validator->fails()) {
								                return redirect('tipoServicio')
								                                ->withErrors($validator)
								                                ->withInput();
								            }else{  


												     $objTipoServicio=TipoServicio::find($request->tipo_servicio_id);

												     $objTipoServicio->nombre=$request->nombre;
												     $objTipoServicio->estado_id=$request->estado;
												     $objTipoServicio->fecha_modificacion=Carbon::now();
												     $objTipoServicio->usuario_modificacion=Auth::user()->id;
												     $objTipoServicio->save();
    		     							}
		       
		 }else{


		 					 $messages = [
								                'tipo_servicio.required' => 'Campo :attribute es requerido.',
								                'tipo_servicio.max' => 'Campo :attribute debe tener un tamaño de :max.',
								                'tipo_servicio.unique' => 'Campo :attribute ya se encuentra registrado.',
								            ];
								            $validator = Validator::make($request->all(),[
								                
								                'nombre' => 'required|max:254|unique:tipo_servicio'
								                
								            ], $messages);

								            if ($validator->fails()) {
								                return redirect('tipoServicio')
								                                ->withErrors($validator)
								                                ->withInput();
								            }else{
											 		$objTipoServicio= new TipoServicio();
											    	$objTipoServicio->nombre=$request->nombre;
											    	$date = Carbon::now();
											    	$objTipoServicio->fecha_ingreso=$date;
											    	$objTipoServicio->usuario_ingreso=Auth::user()->id;
											    	$objTipoServicio->estado_id=$request->estado; 
											    	$objTipoServicio->save();
											}   	
		    	

		 } 

		 Session::flash('message', 'Se ha guardado con exíto. ');
	 	 return redirect()->back();


    }

    public function cambioEstado(Request $request){

	      $objTipoServicio=TipoServicio::find($request->tipoServicioId);

	      if($objTipoServicio->estado_id==Estado::$estadoActivo){
	           $objTipoServicio->estado_id=Estado::$estadoInactivo;
	        }else{
	       	 $objTipoServicio->estado_id=Estado::$estadoActivo;
	        }

	      $objTipoServicio->save();

	      return redirect()->back();

    }

}

