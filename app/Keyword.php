<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'keywords';

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
    protected $fillable = ['name', 'project_id'];

    public function user()
    {
        return $this->belongsToMany('App\Project');
    }
    
}
