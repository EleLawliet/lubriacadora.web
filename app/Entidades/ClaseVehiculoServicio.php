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
        return $this->belongsTo('App\Entidades\Estado' , 'estado_id');
    }

     public function claseVehiculo() {
        return $this->belongsTo('App\Entidades\ClaseVehiculo', 'clase_vehiculo_id');
    }

     public function tipoServicio() {
        return $this->belongsTo('App\Entidades\TipoServicio', 'tipo_servicio_id');
    }

     public function tipoTiempo() {
        return $this->belongsTo('App\Entidades\TipoTiempo', 'tipo_tiempo_id');
    }


     public static function buscarClaseVehiculoServicio(){

      $lstClienteVehiculo = ClaseVehiculoServicio::with('estado','claseVehiculo','tipoServicio', 'tipoTiempo')->orderBy('clase_vehiculo_servicio_id', 'desc')->get();

        return  $lstClienteVehiculo; 
     }


     public static function ValidaClaseVehiculoServicio($tipo_servicio_id, $clase_vehiculo_id,$clase_vehiculo_servicio_id){

     if($clase_vehiculo_servicio_id!=null){
       /*$lstClienteVehiculo = ClaseVehiculoServicio::where('tipo_servicio_id',  $tipo_servicio_id)
      											 ->where('clase_vehiculo_id', $clase_vehiculo_id)
      											  ->whereNot('clase_vehiculo_servicio_id',$clase_vehiculo_servicio_id)->get();

		*/
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

}
