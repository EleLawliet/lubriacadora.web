<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;

class ServiciosCliente extends Model
{

    public $timestamps = false;
    protected $primaryKey = 'servicios_cliente_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'servicios_cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id',
        'descripcion',
        'fecha_ingreso',
        'estado_id',
        'usuario_ingreso'];

    public function estado() {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function detServiciosCliente(){
        return $this->hasMany(DetServiciosCliente::class, 'det_servicios_cliente_id');
    }

    

}
