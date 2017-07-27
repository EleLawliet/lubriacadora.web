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

    public static $km = 1;
    public static $mes = 2;
    public static $cambios = 3;
    

    public function estado() {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function claseVehiculoServicio(){
        return $this->hasMany(ClaseVehiculoServicio::class,'tipo_tiempo_id');
    }

}
