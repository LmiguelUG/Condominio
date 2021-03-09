<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'searchs';

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
    protected $fillable = ['date', 'user_id', 'keyword_id'];

    public function user_id()
    {
        return $this->belongsTo('App\User');
    }
    public function keyword_id()
    {
        return $this->hasOne('App\Keyword');
    }
    
}
