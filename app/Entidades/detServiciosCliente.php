<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;

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
        'servicios_cliente_id'
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
}
