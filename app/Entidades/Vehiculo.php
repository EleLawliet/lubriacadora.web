<?php

namespace App\Entidades;


use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */


    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected  $table = 'vehiculo';
    protected $primaryKey = 'vehiculo_id';

    protected $guarded = [  'clase_vehiculo_id',
                            'estado_id',
                            'marca',
                            'color',
                            'placa',
                            'uso_personal',
                            'anio',
                            'fecha_ingreso',
                            'usuario_ingreso',
                            'fecha_modificacion',
                            'usuario_modificacion'];

     public $timestamps = false;

    public function estado() {
        return $this->belongsTo('App\Entidades\Estado', 'estado_id');
    }

    public function claseVehiculo() {
        return $this->belongsTo('App\Entidades\ClaseVehiculo', 'clase_vehiculo_id')->withDefault();
    }

    

    public static function cargarVehiculo(){
      $lstTipoServicio = Vehiculo::with('estado','claseVehiculo')->get();     
      return $lstTipoServicio;  
     }
}
