<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;
use App\Entidades\Estado;
class TipoServicio extends Model
{
    public    $timestamps = false;
    protected $primaryKey = 'tipo_servicio_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected  $table = 'tipo_servicio';

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

    public function estado() {
        return $this->belongsTo('app\Entidades\Estado');
    }

    public static function cargarTipoServicios(){

    	$lstTipoServicio = TipoServicio::where('estado_id','=',1)
                                   ->orderBy('tipo_servicio_id', 'desc')->get();

        return $lstTipoServicio;                          

    }

}
