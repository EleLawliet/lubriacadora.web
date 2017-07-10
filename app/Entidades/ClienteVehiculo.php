<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;

class ClienteVehiculo extends Model
{
    


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected  $table = 'cliente_vehiculo';
    protected $primaryKey = 'cliente_vehiculo_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['cliente_id',
        'vehiculo_id',
        'estado_id',
        'fecha_ingreso',
        'usuario_ingreso',
        'fecha_modificacion',
        'usuario_modificacion'];

     public    $timestamps = false;

    public function estado() {

        return $this->belongsTo('App\Entidades\Estado', 'estado_id');

    }

    public function cliente() {

        return $this->belongsTo('App\Entidades\Cliente', 'cliente_id');

    }

    public function vehiculo() {

        return $this->belongsTo('App\Entidades\Vehiculo', 'vehiculo_id');

    }

    public static function buscarClienteVeiculo($cliente_id){

        $lstClienteVehiculo = ClienteVehiculo::with('vehiculo')->where('cliente_id','=',$cliente_id)
                                   ->orderBy('cliente_vehiculo_id', 'desc')->get();

        return  $lstClienteVehiculo; 
     }

     /**
     * 	Jose Luis Rendon Ortiz
     *  9/junio/2017
     **/

     public static function buscarClienteVeiculoXId($cliente_id){

        $lstClienteVehiculo = ClienteVehiculo::with('estado','vehiculo','cliente', 'vehiculo.claseVehiculo')->where('cliente_id','=',$cliente_id)->orderBy('cliente_vehiculo_id', 'desc')->get();

        return  $lstClienteVehiculo; 
     }

}
