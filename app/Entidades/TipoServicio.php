<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
   
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected  $table = 'tipo_servicio';
    protected $primaryKey = 'tipo_servicio_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['nombre',
        'fecha_ingreso',
        'usuario_ingreso',
        'fecha_modificacion',
        'usuario_modificacion',
        'estado_id'];

     public    $timestamps = false;

    public function estado() {

        return $this->belongsTo('App\Entidades\Estado', 'estado_id');

    }

    public static function cargarTipoServicios(){

    $lstTipoServicio = TipoServicio::with('estado')->get();

    /*$lstTipoServicio = \DB::table('tipo_servicio')
            ->select(['tipo_servicio.nombre as nombreTipoServicio',
                       'tipo_servicio.tipo_servicio_id as tipo_servicio_id',
                       'estado.nombre as nombreEstado',
                       'estado.estado_id as estado_id'])
            ->join('estado','tipo_servicio.estado_id','=','estado.estado_id')
            ->orderBy('estado.estado_id','asc')->get();
       */
        return $lstTipoServicio;  

     }

}
