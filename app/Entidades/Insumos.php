<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'insumos_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Insumos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre',
        'descripcion',
        'fecha_ingreso',
        'usuario_ingreso',
        'fecha_modificacion',
        'usuario_modificacion'];

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

}
