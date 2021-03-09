<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'alquilers';

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
    protected $fillable = ['tipo', 'detalle', 'monto', 'saldo', 'fecha', 'idcontrato', 'idinmueble'];

    
}
