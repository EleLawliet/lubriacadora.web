<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;

class detServiciosCliente extends Model
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
        'kilometraje_inicio',
        'kilometraje_sustitucion',
        'fecha_inicio',
        'fecha_sustitucion',
        'cantidad_cambio'];

    public function estado() {
        return $this->belongsTo('App\Entidades\Estado');
    }

    public function claseVehiculoServicio() {
        return $this->belongsTo('App\Entidades\ClaseVehiculoServicio');
    }

    public function clienteVehiculo() {
        return $this->belongsTo('App\Entidades\ClienteVehiculo');
    }

    public function insumos() {
        return $this->belongsTo('App\Entidades\Insumos');
    }

    public function serviciosCliente() {
        return $this->belongsTo('App\Entidades\ServiciosCliente');
    }


}
