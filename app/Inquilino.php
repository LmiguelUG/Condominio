<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquilino extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inquilinos';

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
    protected $fillable = ['nombre', 'apellidos', 'telefono','idcondominio'];


}
