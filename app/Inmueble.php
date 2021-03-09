<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inmuebles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo', 'alicuota','idprop','idcondominio','Codigo'];


}
