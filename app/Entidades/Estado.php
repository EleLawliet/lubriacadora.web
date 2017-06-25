<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'estado_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'estado';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];
}
