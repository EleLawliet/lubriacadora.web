<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;
use DB;
class ClaseVehiculoServicio extends Model
{

    public $timestamps = false;
    protected $primaryKey = 'clase_vehiculo_servicio_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clase_vehiculo_servicio';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_servicio_id',
        'clase_vehiculo_id',
        'estado_id',
        'tipo_tiempo_id',
        'dias_personal',
        'dias_trabajo',
        'tiempo_servicio'];

    public function estado() {
        return $this->belongsTo(Estado::class , 'estado_id');
    }

    public function claseVehiculo() {
        return $this->belongsTo(ClaseVehiculo::class, 'clase_vehiculo_id');
    }

    public function tipoServicio() {
        return $this->belongsTo(TipoServicio::class, 'tipo_servicio_id');
    }

    public function tipoTiempo() {
        return $this->belongsTo(TipoTiempo::class, 'tipo_tiempo_id');
    }

    public function detServiciosCliente(){
        return $this->hasMany(DetServiciosCliente::class, 'clase_vehiculo_servicio_id'); 
    }

     public static function buscarClaseVehiculoServicio(){

      $lstClienteVehiculo = ClaseVehiculoServicio::with('estado','claseVehiculo','tipoServicio', 'tipoTiempo')->orderBy('clase_vehiculo_servicio_id', 'desc')->get();

        return  $lstClienteVehiculo; 
     }

      /**
			fecha:16/07/2017
      **/
      public static function cargarPorClaseVehiculo($clase_vehiculo_id){
      $lstClaseVehiculoServicio = ClaseVehiculoServicio::with('estado','claseVehiculo','tipoServicio', 'tipoTiempo')
					      							  ->where('estado_id','=', Estado::$estadoActivo)
					       							  ->where('clase_vehiculo_id','=', $clase_vehiculo_id)
					       							  ->orderBy('clase_vehiculo_servicio_id', 'desc')->get();
        return  $lstClaseVehiculoServicio; 
     }


     public static function ValidaClaseVehiculoServicio($tipo_servicio_id, $clase_vehiculo_id,$clase_vehiculo_servicio_id){

     if($clase_vehiculo_servicio_id!=null){

      	 $lstClienteVehiculo = DB::table('Clase_Vehiculo_Servicio')
			                    ->whereNotIn('clase_vehiculo_servicio_id', [$clase_vehiculo_servicio_id] )
			                    ->where('tipo_servicio_id','=',  $tipo_servicio_id)
			      			    ->where('clase_vehiculo_id', '=',$clase_vehiculo_id)
			                    ->get();
      }else{
      	$lstClienteVehiculo = ClaseVehiculoServicio::where('tipo_servicio_id',  $tipo_servicio_id)
      											   ->where('clase_vehiculo_id', $clase_vehiculo_id)->get();							
      }											  	

      				  

        return  $lstClienteVehiculo; 
     }

      
     public static function buscartipoServicioXusados($tipoTiempoId, $claseVehiculoId){

        $objClaseVehiculoServicio = ClaseVehiculoServicio::where('tipo_tiempo_id', '=', $tipoTiempoId)
                                                ->where('clase_vehiculo_id', '=', $claseVehiculoId)
                                                ->where('estado_id','=', Estado::$estadoActivo)
                                                ->get();
      
        return  $objClaseVehiculoServicio;

    } 

    

}
