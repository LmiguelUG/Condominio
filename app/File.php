<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files';

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
    protected $fillable = ['filename', 'language_id', 'project_id'];

    public function language_id()
    {
        return $this->hasOne('App\Language');
    }
    public function project_id()
    {
        return $this->belongsTo('App\Project');
    }
    
}
