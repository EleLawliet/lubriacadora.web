<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class DetServiciosCliente extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'det_servicios_cliente_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'det_servicios_cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['clase_vehiculo_servicio_id',
        'cliente_vehiculo_id',
        'insumos_id',
        'estado_id',
        'servicios_cliente_id',
        'kilometraje_inicio',
        'kilometraje_sustitucion',
        'fecha_inicio',
        'fecha_sustitucion',
        'cantidad_cambio'];



    public function estado() {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function claseVehiculoServicio() {
        return $this->belongsTo(ClaseVehiculoServicio::class , 'clase_vehiculo_servicio_id');
    }

    public function clienteVehiculo() {
        return $this->belongsTo(ClienteVehiculo::class, 'cliente_vehiculo_id');
    }

    public function insumos() {
        return $this->belongsTo(Insumos::class , 'insumos_id');
    }

    public function serviciosCliente() {
        return $this->belongsTo(ServiciosCliente::class, 'servicios_cliente_id');
    }


    /**
     cargar servicios que se han realizado al vehiculo
     wilmer vera
     fecha:17/07/2017
   **/

   public static function buscarServiciosClienteXvehiculo($cliente_vehiculo_id){

        $lstDetServiciosCliente = DetServiciosCliente::with(['claseVehiculoServicio.tipoServicio','claseVehiculoServicio.claseVehiculo','claseVehiculoServicio.TipoTiempo','insumos'])
            ->where('cliente_vehiculo_id','=', $cliente_vehiculo_id)
            ->where('estado_id','=', Estado::$estadoActivo)
            ->where('fecha_sustitucion','>' ,Carbon::now())->get();

        $arrayData=[];
       
           $i=0;
          
           foreach ($lstDetServiciosCliente as $claseVehiculo_vehicles){
            if(count($claseVehiculo_vehicles->claseVehiculoServicio)>0){
            $arrayData[$i]['detServiciosCliente']=(object)$claseVehiculo_vehicles->getAttributes();
            //$arrayData[$i]['claseVehiculoServicio']=(object)$claseVehiculo_vehicles->claseVehiculoServicio->getAttributes();
            //$arrayData[$i]['ClaseVehiculo']=(object)$claseVehiculo_vehicles->claseVehiculoServicio->claseVehiculo->getAttributes();
            $arrayData[$i]['ClaseVehiculo']=(object)$claseVehiculo_vehicles->claseVehiculoServicio->claseVehiculo->getAttributes();
            $arrayData[$i]['tipoServicio']=(object)$claseVehiculo_vehicles->claseVehiculoServicio->tipoServicio->getAttributes();
            $arrayData[$i]['claseVehiculoServicio']=(object)$claseVehiculo_vehicles->claseVehiculoServicio->getAttributes();
            $arrayData[$i]['TipoTiempo']=(object)$claseVehiculo_vehicles->claseVehiculoServicio->tipoTiempo->getAttributes();
            

                       $i++;
            }

           }
        

        return  $arrayData;

    }

    public static function buscarServiciosClienteXclaseServicio($cliente_vehiculo_id, $clase_vehiculo_servicio_id,$num){

        
        $objDetServiciosCliente=DetServiciosCliente::where('cliente_vehiculo_id','=',$cliente_vehiculo_id) 
                                                   ->where('clase_vehiculo_servicio_id','=',$clase_vehiculo_servicio_id)
                                                   ->where('estado_id','=', Estado::$estadoActivo)
                                                   ->where('cantidad_cambio','<', $num)
                                                   ->get();
       
        return  $objDetServiciosCliente;                                          


    }


    public static function  buscarPorClienteYservicio($cliente_vehiculo_id, $clase_vehiculo_servicio_id){

        $lstDetServiciosCliente=DetServiciosCliente::where('cliente_vehiculo_id','=',$cliente_vehiculo_id) 
                                                   ->where('clase_vehiculo_servicio_id','=',$clase_vehiculo_servicio_id)
                                                   ->where('estado_id','=', Estado::$estadoActivo)
                                                   ->get();
       
        return  $lstDetServiciosCliente;                                          


    }
        
    

    

}
