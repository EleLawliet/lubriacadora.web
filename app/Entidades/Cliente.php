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

    public function clienteVehiculo(){
      return $this->hasMany(ClienteVehiculo::class,'cliente_id');
    }

    public function serviciosCliente(){
        return $this->hasMany(ServiciosCliente::class, 'cliente_id');              
    }

    public static function buscarCedula($cedula){
        $lstCliente = Cliente::with('estado')->where('cedula','=',$cedula)
                                   ->orderBy('cliente_id', 'desc')->first();
        return  $lstCliente; 
    }



   

   /**
     cargar vehiculos  del cliente al  wsdl
     wilmer vera
     fecha:17/07/2017
   **/

   public static function buscarCedulaVehicles($cedula){

        $lstCliente = Cliente::with(['estado','clienteVehiculo.vehiculo.claseVehiculo'])->where('cedula','=',$cedula)
            ->orderBy('cliente_id', 'desc')->get();

        $arrayData=[];
        foreach ($lstCliente as $cliente){
           $tmpVehicle=$cliente->ClienteVehiculo;
           $i=0;
           foreach ($tmpVehicle as $client_vehicles){
               if(count($client_vehicles->vehiculo)>0){
                   $arrayData[$i]['cliente_vehiculo']=(object)$client_vehicles->getAttributes();
                   $arrayData[$i]['vehiculo']=(object)$client_vehicles->vehiculo->getAttributes();
                   $arrayData[$i]['claseVehiculo']=(object)$client_vehicles->vehiculo->claseVehiculo->getAttributes();

                   $i++;
               }

           }
        }

       return  $arrayData;

    }

  
}


