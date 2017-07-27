<?php

namespace App\Http\Controllers\Servicios;

use Illuminate\Http\Request;
use App\Entidades\Insumos;
use App\Entidades\Estado;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Validator;
use Request as userip;
use App\Entidades\Vehiculo;


class InsumosController extends Controller
{


    public function index(){

       $lsInsumos= Insumos::cargarInsumos();      
       $lstEstado= Estado::all();
       return view('Servicios.insumos', compact('lsInsumos','lstEstado'));                 

    }


    public function  guardarInsumos(Request $request){

    	  try {

    	     
						    	$var_tipos_servicio_id=$request->tipo_servicio_id;
						    	if($var_tipos_servicio_id){

							    			$messages = [
							                'insumos.required' => 'Campo :attribute es requerido.',
							                'insumos.max' => 'Campo :attribute debe tener un tamaño de :max.',
							                'insumos.unique' => 'Campo :attribute ya se encuentra registrado.',	
								            ];

								            $validator = Validator::make($request->all(),[
								            'nombre' =>'required|max:255|unique:insumos,nombre,' . $request->tipo_servicio_id . ',insumos_id'              
								            ], $messages);

								            if ($validator->fails()) {
								                return redirect('insumos')
								                                ->withErrors($validator)
								                                ->withInput();
								            }else{  


													     $objInsumos=Insumos::find($request->tipo_servicio_id);

													     $objInsumos->nombre=$request->nombre;
													     $objInsumos->estado_id=$request->estado;
													     $objInsumos->fecha_modificacion=Carbon::now();
													     $objInsumos->usuario_modificacion=Auth::user()->id;
													     $objInsumos->save();


									    }
						    		  								       
								 }else{

								 			 $messages = [
								                'insumos.required' => 'Campo :attribute es requerido.',
								                'insumos.max' => 'Campo :attribute debe tener un tamaño de :max.',
								                'insumos.unique' => 'Campo :attribute ya se encuentra registrado.',
								            ];
								            $validator = Validator::make($request->all(),[
								                
								                'nombre' => 'required|max:254|unique:insumos'
								                
								            ], $messages);

								            if ($validator->fails()) {
								                return redirect('insumos')
								                                ->withErrors($validator)
								                                ->withInput();
								            }else{

											 		$objInsumos= new Insumos();
											    	$objInsumos->nombre=$request->nombre;
											    	$date = Carbon::now();
											    	$objInsumos->fecha_ingreso=$date;
											    	$objInsumos->usuario_ingreso=Auth::user()->id;
											    	$objInsumos->estado_id=$request->estado; 
											    	$objInsumos->save();
								    		}

								 } 

		     
         }catch(\Exception $e){
                    Session::flash('message',$e->getMessage());
                   return redirect()->back();
           } 

		 Session::flash('message', 'Se ha guardado con exíto. ');
	 	 return redirect()->back();


    }

    public function validaNombreInsumos(Request $request){

    	 $resultInsumos = Insumos::obtenerInsumosNombre($request->nombreInsumos);        
         return $resultInsumos;

    }
    

   

}
