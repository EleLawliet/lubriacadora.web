<?php

namespace App\Entidades;

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
    protected $table = 'insumos';

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
        'usuario_modificacion',
        'estado_id'];


   public function estado() {
        return $this->belongsTo(Estado::class, 'estado_id');
    }
    
    public function detServiciosCliente(){
        return $this->hasMany(DetServiciosCliente::class, 'det_servicios_cliente_id'); 
    }

    public static function cargarInsumos(){

        $lstInsumos = Insumos::with('estado')->get();
        return $lstInsumos;  
        

     }

}
