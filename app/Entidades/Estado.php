<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'estado';
    protected $primaryKey = 'estado_id';
    public $timestamps = false;

    public static $estadoActivo = 1;
    public static $estadoInactivo = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];
    
    
     public function tipoServicio(){
        return $this->hasMany('App\Entidades\TipoServicio');
    } 

    public function vehiculo(){
        return $this->hasMany('App\Entidades\Vehiculo');
    } 

    public function cliente(){
        return $this->hasMany('App\Entidades\Cliente');
    } 
}
