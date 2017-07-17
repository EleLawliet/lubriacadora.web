<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;

class Tips extends Model
{
   

    protected  $table = 'Tips';
    protected $primaryKey = 'tips_id';

    protected $guarded = [  'nombre',
                            'enlace',
                            'descripcion',
                            'fecha_ingreso'];

     public $timestamps = false;


    

      public static function buscarTips(){

        $lstTips = Tips::get();

        return  $lstTips; 
     }
     
}
