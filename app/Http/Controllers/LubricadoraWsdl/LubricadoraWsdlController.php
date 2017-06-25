<?php

namespace App\Http\Controllers\LubricadoraWsdl;

use Illuminate\Http\Request;
use App\Entidades\Cliente;

use Response;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class LubricadoraWsdlController extends Controller
{

    /**
	 * Muestra el listado de clientes
	 * @author josé rendón
	 * @since  junio 2017
	 * @return Datagrid
	 */
	public function getListado(Request $request)
	{
		

		try {
			//grid de las comuidades ya renderizado para mostrar en patalla
			$objCliente =  Cliente::all();
			
		
		} catch (\Exception $e) {
			\Log::error("ERROR: ".$e->getMessage());
			$request->session()->flash('msj-error', "ERROR en metodo getListado");
		}

		return Response::json($objCliente, 200);
	}


	  public function datosXCliente(Request $request){
    
    		try {

    			//se recuperan los datos por comunidad
    			$datos = Cliente::find($request->codigo);
    			 
    			//se arma e inicializa el codigo y el response de la firma
    			$statusCode = 200;

    			$response = [
    					'codigo'  => '000',
    					'mensaje' => 'Consulta de datos exitosa!',
    					'datos' => ['nombre' => $datos->nombre
		    							,'apellido' => $datos->apellido
		    							,'cedula' => $datos->cedula]
    			];
    		} catch (\RuntimeException $e) {
    			//ocurre un error recuperando los datos por comunidad
    			$statusCode = 200;
    			$response = [
    					'codigo'  => '001',
    					'mensaje' => 'Error en los datos de entrada!'
    			];
    			\Log::error("ERROR: ".$e->getMessage());
    		}	
    		return Response::json($response, $statusCode);
    }
}