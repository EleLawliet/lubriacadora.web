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

    public function vehiculo() {

        return $this->belongsTo('App\Entidades\Cliente', 'cliente_id');

    }

    public function cliente() {

        return $this->belongsTo('App\Entidades\Vehiculo', 'vehicul');

    }


}
