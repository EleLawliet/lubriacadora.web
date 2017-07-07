<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'cliente_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre',
        'apellido',
        'cedula',
        'telefono',
        'movil',
        'correo',
        'direccion',
        'fecha_registro',
        'estado_id'];

    public function estado() {
        return $this->belongsTo('App\Entidades\Estado');
    }

   public static function buscarCedula($cedula){

        $lstCliente = Cliente::with('estado')->where('cedula','=',$cedula)
                                   ->orderBy('cliente_id', 'desc')->first();

        return  $lstCliente; 

   }
}


