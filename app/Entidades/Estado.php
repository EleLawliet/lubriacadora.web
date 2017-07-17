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
        return $this->hasMany(TipoServicio::class , 'tipo_servicio_id');
    } 

    public function claseVehiculo(){
        return $this->hasMany(ClaseVehiculo::class , 'clase_vehiculo_id');
    } 

    public function vehiculo(){
        return $this->hasMany(Vehiculo::class , 'vehiculo_id');
    } 

    public function cliente(){
        return $this->hasMany(Cliente::class , 'cliente_id');
    } 

    public function ServiciosCliente(){
        return $this->hasMany(ServiciosCliente::class, 'servicios_cliente_id'); 
    }

    public function detServiciosCliente(){
        return $this->hasMany(DetServiciosCliente::class, 'det_servicios_cliente_id'); 
    }

    public function insumos(){
        return $this->hasMany(Insumos::class, 'insumos_id'); 
    }

    public function tipoTiempo(){
        return $this->hasMany(TipoTiempo::class, 'tipo_tiempo_id'); 
    }

    public function claseVehiculoServicio(){
        return $this->hasMany(ClaseVehiculoServicio::class,'clase_vehiculo_servicio_id');
    }

    public function ClienteVehiculo(){
      return $this->hasMany(ClienteVehiculo::class,'cliente_id');
    }


    

    
}
