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
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function vehiculo() {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function detServiciosCliente(){
        return $this->hasMany(DetServiciosCliente::class, 'det_servicios_cliente_id'); 
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

     public static function buscarClienteVehiculoXId($cliente_id){

        $lstClienteVehiculo = ClienteVehiculo::with('estado','vehiculo','cliente', 'vehiculo.claseVehiculo','vehiculo.estado')->where('cliente_id','=',$cliente_id)->orderBy('cliente_vehiculo_id', 'desc')->get();

        return  $lstClienteVehiculo; 
     }

      public static function buscarExisteClienteVehiculoXId($cliente_vehiculo_id, $vehiculo_id){

        $lstClienteVehiculo = ClienteVehiculo::with('estado','vehiculo','cliente', 'vehiculo.claseVehiculo','vehiculo.estado')
        ->where('cliente_vehiculo_id','=',$cliente_vehiculo_id)
        ->where('vehiculo_id','=',$vehiculo_id)
        ->orderBy('cliente_vehiculo_id', 'desc')->get();

        return  $lstClienteVehiculo; 
     }

}
