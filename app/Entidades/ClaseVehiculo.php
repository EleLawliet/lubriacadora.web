<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;

class ClaseVehiculo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */


    protected  $table = 'clase_vehiculo';
    protected $primaryKey = 'clase_vehiculo_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['estado_id','nombre',
        'descripcion',
        'fecha_ingreso',
        'fecha_modificacion',
        'usuario_ingreso',
        'usuario_modificacion'];


    public static $taxi=1;
    public static $tricimoto=2;
    public static $vehiculosLivianosYpesados=3;

    public    $timestamps = false;

    public function estado() {
        return $this->belongsTo(Estado::class , 'estado_id');
    }

    public function vehiculo(){
        return $this->hasMany(Vehiculo::class,'clase_vehiculo_id');
    }

     public function claseVehiculoServicio(){
        return $this->hasMany(ClaseVehiculoServicio::class,'clase_vehiculo_id');
    }

    


     public static function cargarClaseVehiculo(){
       $lstClaseVehiculo = ClaseVehiculo::with('estado')->get();
        return $lstClaseVehiculo;  

     }

     

     

}
