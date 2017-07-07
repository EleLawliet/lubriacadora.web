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

    protected $fillable = ['nombre',
        'descripcion',
        'fecha_ingreso',
        'fecha_modificacion',
        'usuario_ingreso',
        'usuario_modificacion'];

     public    $timestamps = false;

    public function estado() {
        return $this->belongsTo('App\Entidades\Estado');
    }

     public static function cargarClaseVehiculo(){
       $lstClaseVehiculo = ClaseVehiculo::with('estado')->get();
        return $lstClaseVehiculo;  

     }

}
