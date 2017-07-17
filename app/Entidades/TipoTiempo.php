<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;



class TipoTiempo extends Model
{
   

    protected  $table = 'tipo_tiempo';
    protected  $primaryKey = 'tipo_tiempo_id';

    protected  $guarded = [  'nombre',
                            'estado_id'];

    public    $timestamps = false;

    public function estado() {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function claseVehiculoServicio(){
        return $this->hasMany(ClaseVehiculoServicio::class,'clase_vehiculo_servicio_id');
    }

}
